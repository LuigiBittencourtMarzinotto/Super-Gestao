<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\PedidoProduto;
use App\Models\Produto;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\String_;

class PedidoProdutoController extends Controller
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
    public function create(string $id)
    {
        $pedido  = Pedido::find($id);
        $produtos = Produto::all();
        return view("app.pedido-produto.create", ['pedido' => $pedido, "produtos" => $produtos,'msg' => 'Cadastrar']);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $id)
    {
        $request->validate(PedidoProduto::rules(), PedidoProduto::feedback());
        // PedidoProduto::create([
        //     "produto_id" => $request->get("produto_id"),
        //     "quantidade" => $request->get("quantidade"),
        //     "pedido_id" => $id
        // ]);
        $pedido = Pedido::find($id);

        $pedido->produtos()->attach($request->get("produto_id"), [
            "quantidade" => $request->get("quantidade")
        ]);
        return redirect()->route("pedido-produto.create", $id);
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
        ///
    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $pedidoProdutoId, String $pedidoId)
    {
        $pedidoProduto = PedidoProduto::find($pedidoProdutoId);
        $pedidoProduto->delete();
        $produtos = Produto::all();
        $pedido = Pedido::find($pedidoId);

        return view("app.pedido-produto.create", ['pedido' => $pedido, "produtos" => $produtos,'msg' => 'Editar']);

    }
}
