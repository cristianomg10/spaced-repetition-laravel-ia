<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

use App\Models\Modulo;

class Disciplina extends Model
{
    function modulos(){
        return $this->hasMany(Modulo::class);
    }
}
