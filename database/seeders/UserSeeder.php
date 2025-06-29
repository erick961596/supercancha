<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin Demo',
            'email' => 'erick.perezrayo54@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'admin'
        ]);

        User::create([
            'name' => 'Dueño de Cancha',
            'email' => 'ckperezr@gmail.com.com',
            'password' => Hash::make('password'),
            'role' => 'owner'
        ]);

        User::create([
            'name' => 'Jugador de Prueba',
            'email' => 'rotuestructuras@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'player'
        ]);
    }
}
