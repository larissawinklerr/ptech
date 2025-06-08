<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    public function run()
    {
        User::firstOrCreate(
            ['email' => 'larissawinklerc@ptech.com'],
            [
                'name' => 'Larissa AdminPtech',
                'password' => Hash::make('larissa123'),
            ]
        );
    }
}
