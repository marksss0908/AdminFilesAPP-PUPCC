<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\File;
use App\Folder;
use App\Subfolder;

class FileController extends Controller
{
  
    public function index(Subfolder $subfolder)
    {
        $count_file = File::withcount('subfolder')
         ->where('subfolder_id', $subfolder->id)
          ->get();

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

    public function store(Request $request){
        
        // dd($subfolderId);
        // $subfolderId = File::with('subfolder')
        // ->where('subfolder_id', $subfolder->id)
        // ->get();

    //    $file = new File;

    //      $file->filename = $request->filename;
    //      $file->description = $request->description;
    //      $file->subfolder_id = $request->subfolder_id;
    //      $file->save();
        
    //     return redirect()->route('dashboard.index');


        $file = new File;
        if ($request->hasFile('file')) {
            $upload = $request->file('file');   
            $path = $upload->store('public/storage');
            $file->filename = $upload->getClientOriginalName();       
            $file->description = $path;
            $file->subfolder_id = $request->subfolder_id;        
         }
         $file->save();
         return redirect()->route('dashboard.index');
       
        
            // $this->validate($request, [
            //     'filename' => 'required|file'
            // ])

            // $upload = $request->file('filename');
            // $path = $upload->store('public/storage');
            
            // $file = File::create([
            //     'filename' => $upload->getClientOriginalName();
            //     'description' = $path;

            // ]);         

}

    public function download($id){
        $download = File::find($id);
        return storage::download($download->description, $download->filename);
    }
        
}
