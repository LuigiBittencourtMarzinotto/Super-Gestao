<?php

namespace App\Http\Controllers;

use App\Models\MotivoContato;
use App\Models\SiteContato;
use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function contato(){
        $motivos_contatos = MotivoContato::all();
        return view("site.contato", ['motivos_contatos' => $motivos_contatos]);
    }

    public function registerContato(Request $request){
        $contato = new SiteContato();
        $request->validate($contato->rules(), $contato->feedback());
        $contato->create([
            'nome' => $request->nome,
            'telefone' => $request->telefone,
            'email' => $request->email,
            'motivos_contatos_id' => $request->motivo_mensagem,
            'mensagem' => $request->observacao
        ]);
        return redirect()->route('site.index');

    }
}
