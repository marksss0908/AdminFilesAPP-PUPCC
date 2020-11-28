<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Folder;

class FoldersComposer
{
    public function compose(View $view)
    {
        $view->with('folders', Folder::with('subfolders')->get());
    }
}