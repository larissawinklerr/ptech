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
    ];

    public function animais()
    {
        return $this->hasMany(\App\Models\Animal::class);
    }




}
