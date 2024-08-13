<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use App\Models\Item;
use App\Models\ProdutoDetalhe;
use App\Models\Unidade;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $produtos = Item::with(['produtoDetalhe','fornecedor'])->simplePaginate(10);
        return view("app.produto.index",['produtos' => $produtos, 'request' => $request->all()]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $unidades = Unidade::all();
        $fornecedores = Fornecedor::all();
        return view("app.produto.create", ["msg" => "Cadastrar", 'unidades' => $unidades, 'fornecedores' => $fornecedores]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(!empty($request->input("_token")) ){
            $Produto = new Item();
            $request->validate(Item::rules(), Item::feedback());
            $Produto->create($request->all());
            return redirect()->route("produto.index");
        }

        return view("app.produto.store", ['msg' => "Cadastrar"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $produto = Item::find($id);
        return view("app.produto.show", ['produto' => $produto]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $produto = Item::find($id);
        $unidades = Unidade::all();
        $fornecedores = Fornecedor::all();
        return view("app.produto.edit", ['produto' => $produto, 'msg' => "Editar", 'unidades' => $unidades, 'fornecedores' => $fornecedores]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $produto = Item::find($id);
        $request->validate(Item::rules(), Item::feedback());

        $produto->fill($request->all());
        $produto->save();
        return view("app.produto.show", ['produto' => $produto]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $produto = Item::destroy($id);
        return redirect()->route("produto.index");
    }
}
