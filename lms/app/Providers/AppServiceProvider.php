<?php

namespace App\Providers;

use App\PCategory;
use App\Social;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Livewire\ObjectPrybar;
use TCG\Voyager\Models\Category;
use TCG\Voyager\Facades\Voyager;
use App\FormFields\DisabledFormField;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Voyager::addFormField(DisabledFormField::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        //
        View::share('categories' , Category::all());
        View::share('p_categories' , PCategory::all());
        View::share('social' , Social::all());
        Schema::defaultStringLength(191);
        
        Voyager::addAction(\App\Actions\CertificateAction::class);
    }


}

