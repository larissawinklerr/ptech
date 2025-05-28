<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Procedimento extends Model
{
    protected $table = 'procedimentos';

    protected $fillable = [
        'animal_id',
        'rebanho_id',
        'tipo',
        'aplicacao',
        'nome_procedimento',
        'observacoes',
        'data',
    ];



    public function animal()
    {
        return $this->belongsTo(Animal::class, 'animal_id');
    }

    public function rebanho()
    {
        return $this->belongsTo(\App\Models\Rebanho::class, 'rebanho_id');
    }
}
