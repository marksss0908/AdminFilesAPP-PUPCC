<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Folder;
class FolderController extends Controller
{
    public function create(){

        return view('folder.create');
    }

    public function store(Request $request){


            $folder = new Folder;

            $folder->folder_name = $request->foldername;
            $folder->save();
        
        return redirect()->route('dashboard.index');
}
}
