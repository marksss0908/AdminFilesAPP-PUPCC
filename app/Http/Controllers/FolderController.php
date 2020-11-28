<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Folder;

class FolderController extends Controller
{
    public function index()
    {
        $menus = Folder::with('subfolders')->get();
        return view('folders.index', compact('menus'));
    }
}
