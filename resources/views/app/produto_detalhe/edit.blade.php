@extends('app.layouts.basico')
@section('titulo', 'Produto')


@section('conteudo')

<div class="conteudo-pagina">
    <div class="titulo-pagina-app">
        <p>
            Detalhes do Produto - {{ $msg }}
        </p>

    </div>
    @include('app.layouts._partials.produto_menu', ['menu_nome' => "Voltar", "menu_link" => route("produto-detalhe.index")])

    <div class="informacao-pagina">
        <div style="width:30%; margin: auto;">
            @component('app.produto_detalhe._components.form_create_edit', ['ProdutoDetalhe' => $ProdutoDetalhe, "routeLink" => route("produto-detalhe.update", [$ProdutoDetalhe->id]), 'method' => 'PUT', "produtos" => $produtos, "msg" => "Editar"])

            @endcomponent
        </div>
    </div>
</div>

@endsection