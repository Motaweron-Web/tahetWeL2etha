<?php

namespace App\Http\Controllers\Api\Profile;

use App\Http\Controllers\Controller;
use App\Http\Resources\AdResources;
use App\Http\Resources\UserResources;
use App\Models\Ad;
use App\Traits\DefaultImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    use DefaultImage;

    public function updateProfile(Request $request)
    {
        $rules = [
            'first_name' => 'required|min:2|max:191',
            'last_name' => 'required|min:2|max:191',
            'email' => 'nullable|unique:users,email,' . $request->user()->id,
            'image' => 'nullable',

        ];
        $validator = Validator::make($request->all(), $rules, [
            'email.unique' => '410',
        ]);
        if ($validator->fails()) {
            $errors = collect($validator->errors())->flatten(1)[0];
            if (is_numeric($errors)) {
                $errors_arr = [
                    '410' => 'Failed,email already exists',
                ];
                $code = collect($validator->errors())->flatten(1)[0];
                return helperJson(null, isset($errors_arr[$errors]) ? $errors_arr[$errors] : 500, $code);
            }
            return helperJson(null, $validator->errors(), 422);
        }
        $data = $request->validate($rules);
        if ($request->has('image') && $request->image != null) {
            $data['image'] = $this->uploadFiles('users', $request->image, api()->user()->image);
        }
        $request->user()->update($data);
        return helperJson(new UserResources($request->user()));
    }//end fun

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function addAd(Request $request)
    {
        $rules = [
            'title' => 'required',
            'description' => 'required',
            'category_id' => 'required|exists:categories,id',
            'sub_category_id' => 'required|exists:categories,id',
            'address' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'whatsapp' => 'required',
            'phone' => 'required',
            'phone_code' => 'required',
            'type' => 'required|in:lost,found',
            'place_type' => 'required|in:main,special',
            'images' => 'required|array',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return helperJson(null, $validator->errors(), 422);
        }
        $data = $request->except('images');
        $data['user_id'] = $request->user()->id;
        $ad = Ad::create($data);
        if ($request->has('images') && $request->images != null) {
            $images = [];
            foreach ($request->images as $image) {
                $smallArrays = [];
                $smallArrays['image'] = $this->uploadFiles('ads', $image);
                $images[] = $smallArrays;
            }
            $ad->images()->createMany($images);
        }
        return helperJson(new AdResources($ad));
    }//end fun

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateAd(Request $request)
    {
        $rules = [
            'ad_id' => ["required",Rule::exists('ads','id')->where('user_id', $request->user()->id)],
            'title' => 'required',
            'description' => 'required',
            'category_id' => 'required|exists:categories,id',
            'sub_category_id' => 'required|exists:categories,id',
            'address' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'whatsapp' => 'required',
            'phone' => 'required',
            'phone_code' => 'required',
            'type' => 'required|in:lost,found',
            'place_type' => 'required|in:main,special',
            'images' => 'nullable|array',
        ];
        $validator = Validator::make($request->all(), $rules, [
            'ad_id.exists' => '411',
        ]);
        if ($validator->fails()) {
            $errors = collect($validator->errors())->flatten(1)[0];
            if (is_numeric($errors)) {
                $errors_arr = [
                    '411' => 'Failed,ad not found',
                ];
                $code = collect($validator->errors())->flatten(1)[0];
                return helperJson(null, isset($errors_arr[$errors]) ? $errors_arr[$errors] : 500, $code);
            }
            return helperJson(null, $validator->errors(), 422);
        }
        $data = $request->except('images','ad_id');
        $data['user_id'] = $request->user()->id;
        Ad::find($request->ad_id)->update($data);
        $ad = Ad::find($request->ad_id);
        if ($request->has('images') && $request->images != null) {
            $images = [];
            foreach ($request->images as $image) {
                $smallArrays = [];
                $smallArrays['image'] = $this->uploadFiles('ads', $image);
                $images[] = $smallArrays;
            }
            $ad->images()->createMany($images);
        }
        return helperJson(new AdResources($ad));
    }//end fun

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function myAds(Request $request)
    {
        $ads = Ad::Country()->where('user_id', $request->user()->id)
            ->latest()->get();
        return helperJson(AdResources::collection($ads));
    }//end fun

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAd(Request $request)
    {
        $rules = [
            'ad_id' => ["required", Rule::exists('ads', 'id')->where('user_id', api()->user()->id)
                ->where('country', country())],
        ];
        $validator = Validator::make($request->all(), $rules, [
            'ad_id.exists' => '411',
        ]);
        if ($validator->fails()) {
            $errors = collect($validator->errors())->flatten(1)[0];
            if (is_numeric($errors)) {
                $errors_arr = [
                    '411' => 'Failed,ad not found',
                ];
                $code = collect($validator->errors())->flatten(1)[0];
                return helperJson(null, isset($errors_arr[$errors]) ? $errors_arr[$errors] : 500, $code);
            }
            return helperJson(null, $validator->errors(), 422);
        }
        Ad::deleteImages($request->ad_id);
        Ad::destroy($request->ad_id);

        return helperJson(null, 'Ad deleted successfully');
    }//end fun

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAdImage(Request $request)
    {
        $rules = [
            'ad_id' => ["required", Rule::exists('ads', 'id')->where('user_id', api()->user()->id)
                ->where('country', country())],
            'image_id' => ["required", Rule::exists('ad_images', 'id')->where('ad_id', $request->ad_id)],
        ];
        $validator = Validator::make($request->all(), $rules, [
            'ad_id.exists' => '411',
            'image_id.exists' => '412',
        ]);
        if ($validator->fails()) {
            $errors = collect($validator->errors())->flatten(1)[0];
            if (is_numeric($errors)) {
                $errors_arr = [
                    '411' => 'Failed,ad not found',
                    '412' => 'Failed,image not found',
                ];
                $code = collect($validator->errors())->flatten(1)[0];
                return helperJson(null, isset($errors_arr[$errors]) ? $errors_arr[$errors] : 500, $code);
            }
            return helperJson(null, $validator->errors(), 422);
        }
        Ad::deleteImage($request->image_id);
        return helperJson(null, 'Image deleted successfully');
    }//end fun
}//end class
