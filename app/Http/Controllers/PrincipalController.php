<?php

namespace App\Http\Controllers;
use App\Models\MotivoContato;
use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    public function principal(){
        $motivos_contatos = MotivoContato::all();
        return view("site.principal", ['motivos_contatos' => $motivos_contatos]);
    }
}
