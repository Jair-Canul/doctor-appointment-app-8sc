<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         //Crear usuario de prueba cada que se ejecute migraciones
        User::factory()->create([
            'name' => 'Jair David',
            'email' => 'jdcs23032001@gmail.com',
            'password' => bcrypt('12345678'),
            'id_number' => '123456789',
            'phone' => '9994565586',
            'address' => 'Calle 123, Colonia 456',
        ])->assignRole('Doctor');
    }
}
