<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;

class DashboardController extends Controller
{
    public function index(){
        $fileCount = File::count();

        return view('dashboard.index', compact('fileCount'));


    }
}
