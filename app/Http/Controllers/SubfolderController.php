<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Folder;
use App\Subfolder;


class SubfolderController extends Controller
{
    public function create(){
        
        $folders = Folder::all();
         return view('subfolder.create', compact('folders'));
  

    }

    public function store(Request $request){


        $subfolder = new Subfolder;

        $subfolder->subfolder_name = $request->subfoldername;
        $subfolder->folder_id = $request->folder_id;
        $subfolder->save();
    
        return redirect()->route('dashboard.index');
    }
}
