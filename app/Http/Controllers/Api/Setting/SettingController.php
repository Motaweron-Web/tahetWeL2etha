<?php

namespace App\Http\Controllers\Api\Setting;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class SettingController extends Controller
{
    public function index()
    {
        $data = Setting::firstOrFail();
        return helperJson($data);
    }//end fun
    public function contactUs(Request $request)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'text' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return helperJson(null, $validator->errors(), 422);
        }
        ContactUs::create($request->except('country'));
        return helperJson(null, 'done');
    }//end fun
}//end class
