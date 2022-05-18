<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if (admin()->check()) {
            return redirect()->route('admin.index');
        }
        return view('admin.auth.login');
    }//end fun

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function doLogin(Request $request){

        $data = $request->validate([
            'email'=>'required|exists:admins',
            'password'=>'required'
        ]);

        if (admin()->attempt($data,1)) {
            return response()->json(200);
        }
        return response()->json(405);
    }//end fun
    public function logout()
    {
        admin()->logout();
        toastr()->info('تم تسجيل الخروج بنجاح');
        return redirect()->route('admin.login');
    }//end fun
}//end class
