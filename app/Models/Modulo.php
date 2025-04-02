<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\BelongsTo;

use App\Models\Disciplina;

class Modulo extends Model
{
    function disciplina(){
        return $this->belongsTo(Disciplina::class);
    }
}
