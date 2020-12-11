<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;
use App\Folder;
use App\Subfolder;

class FileController extends Controller
{
    public function index(Subfolder $subfolder)
    {
        $files = File::with('subfolder')
            ->where('subfolder_id', $subfolder->id)
            ->get();
        return view('files.index', compact('files', $subfolder->id));
    }


    public function create(Subfolder $subfolder){


        // dd($subfolderId);
        // return view('files.create', compact('subfolderId'));


        return view('files.create', compact('subfolder'));
    }

    public function store(Request $request){


        // dd($subfolderId);
        // $subfolderId = File::with('subfolder')
        // ->where('subfolder_id', $subfolder->id)
        // ->get();

            $file = new File;

            $file->filename = $request->filename;
            $file->description = $request->description;
            $file->subfolder_id = $request->subfolder_id;
            $file->save();
        
        return redirect()->route('dashboard.index');
}
}
