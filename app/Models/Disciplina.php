<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

use App\Models\Modulo;
use App\Models\Estudante;

class Disciplina extends Model
{
    function modulos(){
        return $this->hasMany(Modulo::class);
    }

    function estudantes() {
        return $this->belongsToMany(Estudante::class)->withPivot('id', 'oferta')->withTimestamps();
    }
}
