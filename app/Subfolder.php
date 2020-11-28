<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Folder;

class Subfolder extends Model
{
    public function folder()
    {
        return $this->belongsTo(Folder::class);
    }
}
