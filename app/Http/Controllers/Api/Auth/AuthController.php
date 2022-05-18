<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Traits\DefaultImage;
use App\Models\User;
use App\Models\PhoneTokens;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Http\Resources\{
    UserResources,
};

class AuthController extends Controller
{
    use DefaultImage;

    public function __construct()
    {
        $this->middleware('jwt')->only('logout', 'getProfile', 'insertToken', 'update_profile');
    }//end fun

    public function login(Request $request)
    {
        $rules = [
            'phone_code' => 'required|exists:users,phone_code',
            'phone' => 'required|exists:users,phone'
        ];
        $validator = Validator::make($request->all(), $rules, [
            'phone.exists' => '406',
        ]);
        if ($validator->fails()) {
            $errors = collect($validator->errors())->flatten(1)[0];
            if (is_numeric($errors)) {
                $errors_arr = [
                    '406' => 'Failed,phone not found',
                ];
                $code = collect($validator->errors())->flatten(1)[0];
                return helperJson(null, isset($errors_arr[$errors]) ? $errors_arr[$errors] : 500, $code);
            }
            return response()->json(['data' => null, 'message' => $validator->errors(), 'code' => 422], 200);
        }
        $data = $request->validate($rules);
        $user = User::where($data);
        if ($user->count()) {
            if (!$token = JWTAuth::fromUser($user->firstOrFail())) {
                return helperJson(null, 'there is no user', 406);
            }
            $user = $user->firstOrFail();
            $user->token = $token;
            return helperJson(new UserResources($user), 'good login');
        } else {
            return helperJson(null, 'there is no user', 406);
        }


    }//end fun

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $rules = [
            'phone_code' => 'required',
            'phone' => 'required|unique:users,phone',
            'first_name' => 'required|min:2|max:191',
            'last_name' => 'required|min:2|max:191',
            'email' => 'nullable|unique:users,email',
            'image' => 'nullable',

        ];
        $validator = Validator::make($request->all(), $rules, [
            'phone.unique' => '409',
            'email.unique' => '410',
        ]);
        if ($validator->fails()) {
            $errors = collect($validator->errors())->flatten(1)[0];
            if (is_numeric($errors)) {
                $errors_arr = [
                    '409' => 'Failed,phone number already exists',
                    '410' => 'Failed,email already exists',
                ];
                $code = collect($validator->errors())->flatten(1)[0];
                return helperJson(null, isset($errors_arr[$errors]) ? $errors_arr[$errors] : 500, $code);
            }
            return helperJson(null, $validator->errors(), 422);
        }
        $data = $request->validate($rules);


        if ($request->hasFile('image')) {
            $data['image'] = $this->uploadFiles('users', $request->file('image'));
        } else {
            $data['image'] = $this->storeDefaultImage('users', $request->first_name . ' ' . $request->last_name);
        }

        $user = User::create($data);


        if ($user) {
            if (!$token = JWTAuth::fromUser($user)) {
                return helperJson(null, 'there is no user', 430);
            }
        }
        $user->token = $token;

        return helperJson(new UserResources($user), 'good register');

    }//end fun

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        $rules = [
            'phone_token' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(['data' => null, 'message' => $validator->errors(), 'code' => 422], 200);
        } else {
            PhoneToken::where('phone_token', $request->phone_token)->delete();
            \api()->logout();
            return helperJson(null, 'log out successfully', 200);
        }

    }//end fun

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getProfile(Request $request)
    {
        $token = '';
        if (\api()->check()) {
            if (!$token = JWTAuth::fromUser(\api()->user())) {
                return helperJson(null, 'there is no user', 430);
            }
        }
        api()->user()->token = $token;
        return helperJson(new UserResources(api()->user()), 'good query');
    }//end fun

    /**
     * @param $token
     * @param $user
     * @return array
     */
    protected function respondWithToken($token, $user)
    {
        return [
            'user' => $user,
            'access_token' => 'Bearer ' . $token,
            'token_type' => 'bearer',
//            'expires_in' => auth()->factory()->getTTL()
        ];
    }//end fun
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */

    //======================================================
    //======================================================
    public function updateProfile(Request $request)
    {


        $user = \api()->user();

        $rules = [
//            'phone_number'=>'required|unique:customers,phone_number',
            'phone_code' => 'nullable',
            'phone' => "nullable|unique:users,phone,{$user->id}",
            'first_name' => 'required|min:2|max:191',
            'last_name' => 'required|min:2|max:191',
            'email' => "nullable|unique:users,email,{$user->id}",
            'image' => 'nullable',
        ];
        $validator = Validator::make($request->all(), $rules, [
            'phone.unique' => '409',
            'email.unique' => '410',
        ]);
        if ($validator->fails()) {
            $errors = collect($validator->errors())->flatten(1)[0];
            if (is_numeric($errors)) {
                $errors_arr = [
                    '409' => 'Failed,phone number already exists',
                    '410' => 'Failed,email already exists',
                ];
                $code = collect($validator->errors())->flatten(1)[0];
                return helperJson(null, isset($errors_arr[$errors]) ? $errors_arr[$errors] : 500, $code);
            }
            return response()->json(['data' => null, 'message' => $validator->errors(), 'code' => 422], 200);
        } else {
            $data = $request->all();
//            $user = Customers::where('id',$request->id)->first();

            if ($request->hasFile('image')) {
                $data['image'] = $this->uploadFiles('users', $request->file('image'), api()->user()->image);
            }
            $user->update($data);
            if (!$token = JWTAuth::fromUser($user)) {
                return helperJson(null, 'there is no user', 430);
            }
            $user->token = $token;

            return helperJson(new UserResources($user), 'profile updated successfully');
        }

    }//end fun
    //==========================================================
    //==========================================================
    public function insertToken(Request $request)
    {
        $rules = [
            'token' => 'required',
            'type' => 'required|in:android,ios',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(['data' => null, 'message' => $validator->errors(), 'code' => 422], 200);
        }

        $data = $request->all();
        $data['user_id'] = api()->user()->id;

        PhoneTokens::updateOrCreate($data);
        return helperJson(null, 'successfully');

    }//end fun


}//end class
