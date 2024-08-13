@extends('app.layouts.basico')
@section('titulo', 'Cliente')


@section('conteudo')

<div class="conteudo-pagina">
    <div class="titulo-pagina-app">
        <p>
            Cliente - {{ $msg }}
        </p>

    </div>
    @include('app.layouts._partials.cliente_menu', ['menu_nome' => "Voltar", "menu_link" => route("cliente.index")])

    <div class="informacao-pagina">
        <div style="width:30%; margin: auto;">
            @component('app.cliente._components.form_cliente', ['cliente' => $cliente, "routeLink" => route("cliente.update", [$cliente->id]), 'method' => 'PUT',  "msg" => "Editar"])

            @endcomponent
        </div>
    </div>
</div>

@endsection