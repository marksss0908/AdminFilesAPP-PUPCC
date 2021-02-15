<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\AddFileRequest;

use App\File;
use App\Folder;
use App\Subfolder;

class FileController extends Controller
{
  
    public function index(Subfolder $subfolder)
    {
        // $count_file = File::withcount('subfolder')
        //  ->where('subfolder_id', $subfolder->id)
        //   ->get();

        $files = File::with('subfolder')
            ->where('subfolder_id', $subfolder->id)
            ->get();
        return view('files.index', compact('files','subfolder',  $subfolder->id));
    }


    public function create(Subfolder $subfolder){


        // dd($subfolderId);
        // return view('files.create', compact('subfolderId'));


        return view('files.create', compact('subfolder'));
    }

    public function store(AddFileRequest $request, $subfolder){


        $file = new File;
        if ($request->hasFile('file')) {
            $upload = $request->file('file');   
            $path = $upload->store('public/storage');
            // $file->filename = $upload->getClientOriginalName();      
            $file->document = $upload->getClientOriginalName();   
            $file->filename = $request->filename;
            $file->description = $request->description; 
            $file->path = $path;
            $file->subfolder_id = $request->subfolder_id;        
         }
         $file->save();

        return redirect()->route('files.index', $subfolder)->with('Fileadded', 'File added sucessfully!');
       


}

    public function edit($fileid){

         $file = File::findOrfail($fileid);
        return view('files.edit', compact('file'));
    }

    public function update(Request $request, $fileid){
        
        $fileupdate = File::findOrfail($fileid);
        $fileupdate->update(
            $request->all()
        );
        return redirect()->route('dashboard.index');


   }



    public function download($id){
        $download = File::find($id);
        return storage::download($download->path, $download->document);
    }
        
}