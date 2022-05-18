<?php

namespace App\Providers;

use App\Http\Resources\AdResources;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        AdResources::withoutWrapping(); // and this

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $setting = new \stdClass();
        $setting->title = 'تاهت ولقيتها';
        $setting->logo = url('assets/admin/images/brand/logo.png');
        View::share('setting',$setting);
   }
}
