<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

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
        Blade::component('layouts.components.badge', 'badge');
        Blade::component('layouts.components.updated', 'updated');
        Blade::component('layouts.components.info_card', 'infocard');
        Blade::component('layouts.components.tags', 'tags');
        Blade::component('layouts.components.errors', 'errors');
        Blade::component('layouts.components.success', 'success');
        Blade::component('layouts.components.comment-form', 'commentForm');
    }
}
