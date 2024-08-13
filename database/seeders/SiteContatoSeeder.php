<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SiteContato;
use Database\Factories\SiteContatoFactory;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // SiteContato::create([
        //     'nome'=> 'rovigo',
        //     'telefone'=> '(43) 9865455',
        //     'email'=>"bittencourt.marzintoo@mail",
        //     "motivo_contato" => '1',
        //     'mensagem' => "teste12" 
        // ]);
        SiteContato::factory()->count(100)->create();
    }
}
