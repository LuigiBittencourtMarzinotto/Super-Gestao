@extends('app.layouts.basico')
@section('titulo', 'Produto')


@section('conteudo')

<div class="conteudo-pagina">
    <div class="titulo-pagina-app">
        <p>
            Visualizar Produto 
        </p>

    </div>
    @include('app.layouts._partials.produto_menu', ['menu_nome' => "Voltar", "menu_link" => route("produto.index")])

    <div class="informacao-pagina">
        <div style="width:30%; margin: auto;">
            <table border="1" width="100%" style="text-align: center">
                <tr>
                    <td>
                        ID
                    </td>
                    <td>
                        {{ $ProdutoDetalhe->id }}
                    </td>
                </tr>
                <tr>
                    <td>
                        Nome do Produto vinculado
                    </td>
                    <td>
                        {{ $ProdutoDetalhe->produto->nome }}
                    </td>
                </tr>
                <tr>
                    <td>
                        Comprimento
                    </td>
                    <td>
                        {{ $ProdutoDetalhe->comprimento }}
                    </td>
                </tr>
                <tr>
                    <td>
                        Largura
                    </td>
                    <td>
                        {{ $ProdutoDetalhe->largura }}
                    </td>
                </tr>
                <tr>
                    <td>
                        Altura
                    </td>
                    <td>
                        {{ $ProdutoDetalhe->altura }}
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection