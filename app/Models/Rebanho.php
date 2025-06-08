<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rebanho extends Model
{
    use HasFactory;

    protected $table = 'rebanhos';

    protected $fillable = [
        'nome',
        'descricao',
        'user_id',
    ];

    public function animais()
    {
        return $this->hasManyThrough(
            Animal::class,
            AnimalDetalhes::class,
            'rebanho_id',
            'id',
            'id',
            'animal_id',
        );
    }
}
