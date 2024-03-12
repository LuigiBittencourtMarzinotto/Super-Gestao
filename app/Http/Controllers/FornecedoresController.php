<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedoresController extends Controller
{
    public function index(){
        $fornecedores = [
            0 => [
                'nome' => 'Fornecedor 1',
                'status' => 'S',
                'cnpj' => '00.000.000/000-1',  
                'ddd' => '11'  
            ],
            1 => [
                'nome' => 'Fornecedor 1',
                'status' => 'S',
                'cnpj' => null,
                'ddd' => '43'  
            ],
            2 => [
                'nome' => 'Fornecedor 1',
                'status' => 'S',
                'cnpj' => null,
                'ddd' => '32'  
            ]
        ];
        return view("app.fornecedor.index", compact('fornecedores'));
    }
}
