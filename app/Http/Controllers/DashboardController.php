<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;
use App\Folder;
use App\Subfolder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DashboardController extends Controller
{
    public function index(){

        // Role::create(['name'=>'Registrar-Admission']);
        // Permission::create(['name'=>'Registrar-Admission Permission']);
        // $role = Role::findorfail(3);
        // $permission = Permission::findorfail(3);
        // $role->givePermissionTo($permission);
        
        $fileCount = File::count();
        $folderCount = Folder::count();
        $subfolderCount = Subfolder::count();

        return view('dashboard.index', compact('fileCount', 'folderCount', 'subfolderCount'));

    }
}
