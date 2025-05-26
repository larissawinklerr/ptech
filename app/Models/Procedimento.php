<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Procedimento extends Model
{
    protected $table = 'procedimentos';

    protected $fillable = [
        'animal_id',
        'tipo',
        'aplicacao',
        'nome',
        'observacoes',
        'data',
    ];

    public function animal()
    {
        return $this->belongsTo(Animal::class, 'animal_id');
    }
}
