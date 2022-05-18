<?php

use Illuminate\Support\Facades\Route;



Route::get('login', 'AuthController@login')->name('admin.login');
Route::post('login', 'AuthController@doLogin')->name('admin.login');






Route::group(['middleware'=>'admin'],function (){
    ///////////// auth logout ///////////////
    Route::get('logout','AuthController@logout')->name('admin.logout');
    ///////////// dashboard ///////////////
    Route::view('/','admin.index')->name('admin.index');

    ///////////// setting and admins ///////////////

    //################# admins #######
    Route::resource('admins','AdminController');


});
