<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Llamar a RoleSeeder
        $this->call([
            RoleSeeder::class,
        ]);

        //Crear usuario de prueba cada que se ejecute migraciones
        User::factory()->create([
            'name' => 'Jair David',
            'email' => 'jdcs23032001@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
    }
}
