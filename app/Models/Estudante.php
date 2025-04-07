<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Disciplina;


class Estudante extends Model
{
    function disciplinas() {
        return $this->belongsToMany(Disciplina::class);
    }
}
