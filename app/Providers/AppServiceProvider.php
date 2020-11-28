<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Folder;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        // Option - 1:  Every single view.
        // View::share('folders', Folder::with('subfolders')->get());
        // Option - 2: Specific Views Only.
        View::composer(['layouts._sidebar'], function($view){
            $view->with('folders', Folder::with('subfolders')->get());
        });
    }
}
