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
                        {{ $produto->id }}
                    </td>
                </tr>
                <tr>
                    <td>
                        Nome
                    </td>
                    <td>
                        {{ $produto->nome }}
                    </td>
                </tr>
                <tr>
                    <td>
                        Descricao
                    </td>
                    <td>
                        {{ $produto->descricao }}
                    </td>
                </tr>
                <tr>
                    <td>
                        Peso
                    </td>
                    <td>
                        {{ $produto->peso }}
                    </td>
                </tr>
                <tr>
                    <td>
                        UF
                    </td>
                    <td>
                        {{ $produto->uf }}
                    </td>
                </tr>
                <tr>
                    <td>
                        Comprimento
                    </td>
                    <td>
                        {{ $produto->comprimento }}
                    </td>
                </tr>
                <tr>
                    <td>
                        Largura
                    </td>
                    <td>
                        {{ $produto->largura }}
                    </td>
                </tr>
                <tr>
                    <td>
                        Altura
                    </td>
                    <td>
                        {{ $produto->altura }}
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection