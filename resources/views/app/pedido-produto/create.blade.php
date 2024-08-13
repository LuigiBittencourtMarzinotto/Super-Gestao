@extends('app.layouts.basico')
@section('titulo', 'Pedido Produto')


@section('conteudo')


<div class="conteudo-pagina">
    <div class="titulo-pagina-app">
        <p>
            Pedido Produto - {{ $msg }}
        </p>

    </div>
    @include('app.layouts._partials.pedido_produto_menu', ['menu_nome' => "Voltar", "menu_link" => route("pedido-produto.index")])

    <div class="informacao-pagina">
        <div style="width:30%; margin: auto;">
            @component('app.pedido-produto._components.form_pedido_produto', ["routeLink" => route("pedido-produto.store", $pedido->id), "pedido" => $pedido, "produtos" => $produtos, "msg" => "Cadastrar"])
            @endcomponent
        </div>
    </div>
</div>

@endsection