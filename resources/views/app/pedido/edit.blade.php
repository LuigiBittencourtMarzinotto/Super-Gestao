@extends('app.layouts.basico')
@section('titulo', 'Pedido')


@section('conteudo')

<div class="conteudo-pagina">
    <div class="titulo-pagina-app">
        <p>
            Pedido - {{ $msg }}
        </p>

    </div>
    @include('app.layouts._partials.pedido_menu', ['menu_nome' => "Voltar", "menu_link" => route("pedido.index")])

    <div class="informacao-pagina">
        <div style="width:30%; margin: auto;">
            @component('app.pedido._components.form_pedido', ['pedido' => $pedido, "routeLink" => route("pedido.update", [$pedido->id]), 'method' => 'PUT', "msg" => "Editar", "clientes" => $clientes])

            @endcomponent
        </div>
    </div>
</div>

@endsection