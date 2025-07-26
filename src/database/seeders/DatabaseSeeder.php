<?php

namespace Database\Seeders;

use App\Models\User;
<<<<<<< HEAD
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
=======
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;  // Importar DB para usar truncate
>>>>>>> d624a76 (Corrigindo diversos erros)

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
<<<<<<< HEAD
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
=======
        // Limpar a tabela users antes de criar novos usuários
        DB::table('users')->truncate();

        // Criar um usuário padrão para teste
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('senha123'),  // Definindo senha para o usuário
>>>>>>> d624a76 (Corrigindo diversos erros)
        ]);
    }
}
