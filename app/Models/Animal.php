<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\AnimalDetalhes;
use App\Models\Procedimento;


class Animal extends Model
{
    protected $table = 'animais';

    protected $fillable = [
        'nome',
        'status',
        'peso',
        'sexo',
        'fertilidade',
        'user_id',
    ];

    public function detalhes()
    {
        return $this->hasOne(AnimalDetalhes::class, 'animal_id');
    }

    public function procedimentos()
    {
        return $this->hasMany(Procedimento::class, 'animal_id');
    }

}

