<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $clientes = Cliente::simplePaginate(5);
        return view("app.cliente.index", ['clientes' => $clientes, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("app.cliente.create", ['msg' => "Cadastrar"]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        $request->validate(Cliente::rules(), Cliente::feedback());
        Cliente::create($request->all());
        return redirect()->route("cliente.index");
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
        $cliente = Cliente::find($id);
        return view("app.cliente.edit", ['msg' => "Cadastrar", 'cliente' => $cliente]);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(Cliente::rules(), Cliente::feedback());
        $cliente = Cliente::find($id);
        $cliente->fill($request->all());
        $cliente->save();
        return view("app.cliente.show");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
