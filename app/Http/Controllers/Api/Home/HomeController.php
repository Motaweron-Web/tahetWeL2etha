<?php

namespace App\Http\Controllers\Api\Home;

use App\Http\Controllers\Controller;
use App\Http\Resources\AdResources;
use App\Http\Resources\CategoryResources;
use App\Models\Ad;
use App\Models\AdFollowers;
use App\Models\AdViews;
use App\Models\Categories;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt')->only('deleteAndFollow');
    }
    public function index()
    {
        $sliderProductIds = Slider::Country()->pluck('ad_id')->toArray();
        $productSlider = Ad::wherein('id', $sliderProductIds)->get();// get slider ads

        $homeAds = [];
        if (api()->check()) {
            $homeAds = self::getIfAuthenticated();
        } else {
            $homeAds = Ad::Country()->isSpecial()->latest()->get()->take(3);
        }

        $data['ads'] = AdResources::collection($homeAds);
        $data['slider'] = AdResources::collection($productSlider);
        return helperJson($data);

    }//end fun

    /**
     * @return mixed
     */
    private function getIfAuthenticated()
    {
        $myAds = Ad::Country()->where('user_id', api()->id())->get(); // get my ads
        if (count($myAds)) {
            $homeAds = Ad::where(function ($orQuery) use ($myAds) {
                $orQuery->wherein('category_id', $myAds->pluck('category_id')->toArray())
                    ->orWherein('sub_category_id', $myAds->pluck('sub_category_id')->toArray());
            })->where('user_id', '!=', api()->id())->get();
            if (count($homeAds)) {
                $homeAds = $homeAds->take(3);
            } else {
                $homeAds = Ad::Country()->isSpecial()->latest()->get()->take(3);
            }
        } else {
            $homeAds = Ad::Country()->isSpecial()->latest()->get()->take(3);
        }
        return $homeAds;
    }//end fun

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAds(Request $request)
    {
        $ads = Ad::Country();

        if ($request->has('category_id') && $request->category_id != 0) {
            $ads->where('category_id', $request->category_id);
        }

        if ($request->has('sub_category_id') && $request->sub_category_id != 0) {
            $ads->where('sub_category_id', $request->sub_category_id);
        }

        if ($request->has('search') && $request->search != '') {
            $ads->where(function ($search) use ($request) {
                $search->where('title', 'like', '%' . $request->search . '%')
                    ->orWhere('description', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->has('type') && $request->type != '') {
            $ads->where('type', $request->type);
        }

        if ($request->has('place_type') && $request->place_type != '') {
            $ads->where('place_type', $request->place_type);
        }


        return helperJson(AdResources::collection($ads->latest()->get()));
    }//end fun

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getOneAd(Request $request)
    {
        $rules = [
            'phone_key' => ['required'],
            'ad_id' => ["required", Rule::exists('ads', 'id')->where('country', country())],
        ];
        $validator = Validator::make($request->all(), $rules, [
            'ad_id.exists' => '411',
        ]);
        if ($validator->fails()) {
            $errors = collect($validator->errors())->flatten(1)[0];
            if (is_numeric($errors)) {
                $errors_arr = [
                    '411' => 'Failed,add not found',
                ];
                $code = collect($validator->errors())->flatten(1)[0];
                return helperJson(null, isset($errors_arr[$errors]) ? $errors_arr[$errors] : 500, $code);
            }
            return helperJson(null, $validator->errors(), 422);
        }
        $storeViews = $request->only('ad_id', 'phone_key');
        AdViews::updateOrCreate($storeViews);
        $data['ad'] = new AdResources(Ad::Country()->findOrFail($request->ad_id));
        $related = Ad::Country()->where('category_id', $data['ad']->category_id)
            ->where('sub_category_id', $data['ad']->sub_category_id)
            ->where('id', '!=', $data['ad']->id)->get();
        $data['related'] = AdResources::collection($related);
        return helperJson($data);
    }//end fun

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCategories()
    {
        $categories = Categories::where('level', 1)->latest()->get();
        return helperJson(CategoryResources::collection($categories));
    }//end fun

    public function deleteAndFollow(Request $request)
    {
        $rules = [
            'ad_id' => ["required", Rule::exists('ads', 'id')->where('country', country())],
        ];
        $validator = Validator::make($request->all(), $rules, [
            'ad_id.exists' => '411',
        ]);
        if ($validator->fails()) {
            $errors = collect($validator->errors())->flatten(1)[0];
            if (is_numeric($errors)) {
                $errors_arr = [
                    '411' => 'Failed,add not found',
                ];
                $code = collect($validator->errors())->flatten(1)[0];
                return helperJson(null, isset($errors_arr[$errors]) ? $errors_arr[$errors] : 500, $code);
            }
            return helperJson(null, $validator->errors(), 422);
        }
        $data['ad_id'] = $request->ad_id;
        $data['user_id'] = auth()->user()->id;
        AdFollowers::createOrDelete($data);
        return helperJson(null,'done', 200);
    }//end fun

}//end fun
