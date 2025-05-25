<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnimalDetalhes extends Model
{
    protected $table = 'animal_detalhes';

    protected $fillable = [
        'animal_id',
        'nome',
        'data_nascimento',
        'raca',
        'peso_nascimento',
        'peso_atual',
        'brinco_chip',
        'rebanho_id',
    ];

    public function animal()
    {
        return $this->belongsTo(\App\Models\Animal::class, 'animal_id');
    }

    public function rebanho()
    {
        return $this->belongsTo(Rebanho::class);
    }
}
