<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Fornecedor;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Fornecedor::create([
            'nome' => 'Luigi',
            'site' => 'luigi.gmail.com.br',
            'uf' => "PR",
            'email' => "marzinto@gmail.com.br",
        ]);

    }
}
