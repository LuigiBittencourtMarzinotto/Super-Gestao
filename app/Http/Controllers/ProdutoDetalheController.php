<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ItemDetalhe;
use Illuminate\Http\Request;

class ProdutoDetalheController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $produtos = Item::all();
        return view('app.produto_detalhe.create', ['produtos' => $produtos, 'msg' => 'Cadastrar']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(!empty($request->input("_token"))){
            $ProdutoDetalhe = new ItemDetalhe();
            $request->validate($ProdutoDetalhe->rules(),$ProdutoDetalhe->feedback());
            $ProdutoDetalhe->create($request->all());
            return redirect()->route("produto-detalhe.index");
        }

        return view("app.produto-datalhe.store", ['msg' => "Cadastrar"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $ProdutoDetalhe = ItemDetalhe::with(['produto'])->find($id);
        $produtos = Item::all();
        return view("app.produto_detalhe.edit", ['ProdutoDetalhe' => $ProdutoDetalhe, 'msg' => "Editar", 'produtos' => $produtos]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $ProdutoDetalhe = ItemDetalhe::find($id);
        $ProdutoDetalhe->fill($request->all());
        $ProdutoDetalhe->save();
        return view("app.produto_detalhe.show", ['ProdutoDetalhe' => $ProdutoDetalhe]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
