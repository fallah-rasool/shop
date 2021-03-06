<?php

namespace App\Providers;

use App\Models\Brand;
use App\Models\Category;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
       view()->composer(['client.index','client.products.show','client.register.create','client.register.verifyOtp'],function ($view){
           $view->with([
               'categories'=>Category::query()->where('patent_id',null)->get(),
                'brands'=>Brand::all(),
           ]);
       });
    }
}
