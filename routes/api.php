<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['checkForCountry'])->group(function()
{
//================================== auth ============================
    Route::group(['namespace' => 'Auth','prefix' => 'auth'],function (){

        Route::post('login','AuthController@login');
        Route::post('logout','AuthController@logout');
        Route::POST('register','AuthController@register');
        Route::get('getProfile','AuthController@getProfile');
        Route::POST('updateProfile','AuthController@updateProfile');
        Route::POST('insertToken','AuthController@insertToken');
    });

//================================== home ============================
    Route::group(['namespace' => 'Home','prefix' => 'home'],function (){

        Route::get('index','HomeController@index');
        Route::get('getAds','HomeController@getAds');
        Route::get('getOneAd','HomeController@getOneAd');
        Route::get('getCategories','HomeController@getCategories');
        Route::get('follow-delete-Ad','HomeController@deleteAndFollow');
    });

//================================== profile ============================
    Route::group(['namespace' => 'Profile','prefix' => 'profile','middleware'=>'jwt'],function (){
        Route::POST('updateProfile','ProfileController@updateProfile');
        Route::get('myAds','ProfileController@myAds');
        Route::POST('addAd','ProfileController@addAd');
        Route::POST('updateAd','ProfileController@updateAd');
        Route::POST('deleteAd','ProfileController@deleteAd');
        Route::POST('deleteAdImage','ProfileController@deleteAdImage');
    });

//================================== setting ============================
    Route::group(['namespace' => 'Setting','prefix' => 'setting'],function (){
        Route::get('index','SettingController@index');
        Route::POST('contactUs','SettingController@contactUs');
    });

    //================================== chat ============================
    Route::group(['namespace' => 'Chat','prefix' => 'chat','middleware'=>'jwt'],function (){
        Route::get('index','ChatController@index');
        Route::POST('sendMessage','ChatController@sendMessage');
        Route::get('myRooms','ChatController@myRooms');
    });
});


Route::fallback(function () {
    return helperJson(null,'URL NOT FOUND!',404);
});

