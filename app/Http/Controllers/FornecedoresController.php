<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Redis;

class FornecedoresController extends Controller
{
    public function index(){
        return view("app.fornecedor.index");
    }

    public function listar(Request $request){
        $fornecedores = Fornecedor::where('nome', 'like','%'.$request->get("nome").'%')
        ->where('site', 'like','%'.$request->get("site").'%')
        ->where('uf', 'like','%'.$request->get("uf").'%')
        ->where('email', 'like','%'.$request->get("email").'%')
        ->with(['produtos'])->simplePaginate(2);
        return view("app.fornecedor.listar",['fornecedores' => $fornecedores, 'request' => $request->all()]);
    }
    
    public function adicionar(Request $request){

        if(!empty($request->input("_token")) and empty($request->input("id"))){
            $Fornecedor = new Fornecedor();
            $request->validate($Fornecedor->rules(),$Fornecedor->feedback());
            $Fornecedor->create($request->all());
            return redirect()->route("app.fornecedor");
        }

        if(!empty($request->input("_token")) and !empty($request->input("id"))){
            $Fornecedor = new Fornecedor();
            $fornecedor = Fornecedor::find($request->get("id"));
            $fornecedor->fill($request->all());
            $fornecedor->save();
            return redirect()->route("app.fornecedor");
        }
        return view("app.fornecedor.adicionar", ['msg' => "Cadastrar"]);
         
    }
    public function editar(int $id){
       $Fornecedor = Fornecedor::find($id);
       return view("app.fornecedor.adicionar", ['msg' => "Editar", 'fornecedor' => $Fornecedor]);

    }    

    public function destoy(int $id){
        $Fornecedor = Fornecedor::find($id);
        $Fornecedor->delete();
        return redirect()->route("app.fornecedor");

    }
}
