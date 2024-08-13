@extends('app.layouts.basico')
@section('titulo', 'Produto')


@section('conteudo')

<div class="conteudo-pagina">
    <div class="titulo-pagina-app">
        <p>
            Produto - {{ $msg }}
        </p>

    </div>
    @include('app.layouts._partials.produto_menu', ['menu_nome' => "Voltar", "menu_link" => route("produto.index")])

    <div class="informacao-pagina">
        <div style="width:30%; margin: auto;">
            @component('app.produto._components.form_produto', ['produto' => $produto, "routeLink" => route("produto.update", [$produto->id]), 'method' => 'PUT', "unidades" => $unidades, "msg" => "Editar", "fornecedores" => $fornecedores])

            @endcomponent
        </div>
    </div>
</div>

@endsection