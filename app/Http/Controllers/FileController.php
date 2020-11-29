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
        return view('files.index', compact('files'));
    }
}
