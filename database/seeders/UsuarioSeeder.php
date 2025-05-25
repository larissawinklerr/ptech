<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Larissa AdminPtech',
            'email' => 'larissawinklerc@ptech.com',
            'password' => Hash::make('larissa123'), // senha criptografada corretamente
        ]);
    }
}


