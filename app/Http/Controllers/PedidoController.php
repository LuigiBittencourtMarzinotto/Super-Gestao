<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Pedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $pedidos = Pedido::simplePaginate(5);
        return view("app.pedido.index", ['pedidos' => $pedidos, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clientes = Cliente::all();
        return view("app.pedido.create", ['clientes' => $clientes, 'msg' => 'Cadastrar']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(Pedido::rules(), Pedido::feedback());
        Pedido::create($request->all());
        return redirect()->route("pedido.index");
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
        $pedido = Pedido::find($id);

        $clientes = Cliente::all();
        return view("app.pedido.edit", ['pedido' => $pedido, 'msg' => 'Editar', 'clientes' => $clientes]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {   
        $request->validate(Pedido::rules(), Pedido::feedback());
        $pedido = Pedido::find($id);
        $pedido->fill($request->all());
        $pedido->save();
        return redirect()->route("pedido.index");


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
