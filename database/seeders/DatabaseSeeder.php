<?php

namespace Database\Seeders;

use App\Models\Parish;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Parish::create([
            'name' => 'Paróquia São Marcos',
            'address' => 'Rua Roberto Gava, 310 - Pilarzinho',
            'city' => 'Curitiba',
            'state' => 'PR',
            'is_active' => true,
        ]);

        User::factory()->create([
            'name' => 'Administrador',
            'email' => 'admin@email.com',
            'password' => bcrypt('123456'),
            'is_active' => true,
            'is_admin' => true,
        ]);        

        $josias = User::factory()->create([
            'name' => 'Josias Bueno',
            'email' => 'josias@email.com',
            'password' => bcrypt('123456'),
            'is_active' => true,
            'is_admin' => false,
            'selected_parish_id' => 1,
            'selected_parish_name' => 'Paróquia São Marcos',
            'created_by' => 1,
        ]);
        $josias->parishes()->attach(1, ['role' => 'admin']);
    }
}
