<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Role::create(['name'=>'Director']);
        // Permission::create(['name'=>'Director Permission']);
        // $role = Role::findorfail(1);
        // $permission = Permission::findorfail(1);
        // $role->givePermissionTo($permission);

        //auth()->user()->assignRole('student');
        //return view('home');
        return redirect()->route('dashboard.index');
    }

    public function logout(){
        
        auth()->logout();
        return redirect()->route('login');

    }


}
