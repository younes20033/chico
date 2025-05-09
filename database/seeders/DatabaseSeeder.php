<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Créer un compte administrateur
        User::create([
            'name' => 'Admin',
            'email' => 'admin@chicotrans.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        // Créer un compte client de test
        User::create([
            'name' => 'Client Test',
            'email' => 'client@example.com',
            'password' => Hash::make('client123'),
            'role' => 'client',
            'company_name' => 'Entreprise Test',
            'telephone' => '+212 600000000',
        ]);
    }
}