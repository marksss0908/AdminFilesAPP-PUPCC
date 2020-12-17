<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Subfolder;

class File extends Model
{

    public function subfolder()
    {
        return $this->belongsTo(Subfolder::class);
    }    
}
