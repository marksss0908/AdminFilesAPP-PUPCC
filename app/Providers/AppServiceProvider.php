<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Http\View\Composers\FoldersComposer;
use Illuminate\Support\Facades\Gate;
//use App\Folder;
use Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        //Role::create(['name'=>'Director']);
        //Permission::create(['name'=>'Director Permission']);
        //$role = Role::findorfail(1);
        //$permission = Permission::findorfail(1);
        //$role->givePermissionTo($permission);

        //Role::create(['name'=>'Super Admin']);
        //Permission::create(['name'=>'Super Admin Permission']);
        //$role = Role::findorfail(4);
        //$permission = Permission::findorfail(3);
        //$role->givePermissionTo($permission);

        //Role::create(['name'=>'Registrar-Admin']);
        //Permission::create(['name'=>'Registrar-Admin Permission']);
        //$role = Role::findorfail(3);
        //$permission = Permission::findorfail(3);
        //$role->givePermissionTo($permission);

        // Option - 1:  Every single view.
        // View::share('folders', Folder::with('subfolders')->get());
        // Option - 2: Specific Views Only.
        // View::composer(['layouts._sidebar'], function($view){
        //     $view->with('folders', Folder::with('subfolders')->get());
        // });
        // Option - 3 : Dedicated Class
        
        //$userrole = auth()->user()->role;
        //$userRole = Auth::user()->id;
        //dd($userRole);
        View::composer(['layouts._sidebar'], FoldersComposer::class);


    }
}
