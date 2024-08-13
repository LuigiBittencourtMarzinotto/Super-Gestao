@extends('app.layouts.basico')
@section('titulo', 'Produto')


@section('conteudo')

<div class="conteudo-pagina">
    <div class="titulo-pagina-app">
        <p>
            Produto 
        </p>

    </div>
    @include('app.layouts._partials.produto_menu', ['menu_nome' => "Cadastrar", "menu_link" => route("produto.create")])

    <div class="informacao-pagina">
        <div style="width:90%; margin: auto;">
            <table border="1" width="100%" >
                <thead>
                    <tr>
                        <th>
                            ID
                        </th>
                        <th>
                            Nome
                        </th>
                        <th>
                            Descricao
                        </th>
                        <th>
                            Fornecedor codigo
                        </th>
                        <th>
                            Fornecedor nome
                        </th>
                        <th>
                            Peso
                        </th>
                        <th>
                            UF
                        </th>
                        <th>
                            Comprimento
                        </th>
                        <th>
                            Largura
                        </th>
                        <th>
                            Altura
                        </th>
                        <th>
                            
                        </th>
                        <th>
                            
                        </th>
                        <th>
                            
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($produtos as $produto)
                        <tr>
                            <td>
                                {{ $produto->id }}
                            </td>
                            <td>
                                {{ $produto->nome }}
                            </td>
                            <td>
                                {{ $produto->descricao }}
                            </td>
                            <td>
                                {{ $produto->fornecedor->id }}
                            </td>
                            <td>
                                {{ $produto->fornecedor->nome }}
                            </td>
                            <td>
                                {{ $produto->peso }}
                            </td>
                            <td>
                                {{ $produto->uf }}
                            </td>
                            <td>
                                {{ $produto->produtoDetalhe->comprimento ?? "" }}
                            </td>
                            <td>
                                {{ $produto->produtoDetalhe->largura ?? "" }}
                            </td>
                            <td>
                                {{ $produto->produtoDetalhe->altura ?? "" }}
                            </td>
                            <td>
                                <a href="{{ route('produto.show', $produto->id)}}">Visualizar dados</a>

                            </td>
                            <td>
                                <form id="form_{{$produto->id}}" method="post" action="{{ route('produto.destroy', $produto->id)}}">
                                    @method('DELETE')
                                    @csrf
                                    <a href="#" onclick="document.getElementById('form_{{$produto->id}}').submit()">Excluir</a>
                                </form>

                            </td>
                            <td>
                                <a href="{{ route('produto.edit', $produto->id)}}">Editar</a>    
                            </td>
                        </tr>
                        <tr>
                            <td colspan="12">
                                <p>Lista de pedidos</p>
                                <table border="1" style="margin:10px; width:98%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>ID cliente</th>
                                            <th>Data cadastro</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($produto->pedidos as $pedido)
                                            <tr>

                                                <td>
                                                    {{ $pedido->id}}
                                                </td>
                                                <td>
                                                    {{ $pedido->cliente_id}}
                                                </td>
                                                <td>
                                                    {{ $pedido->pivot->created_at->format("d/m/Y")}}
                                                </td>
                                                <td>
                                                    <a href="{{ route("pedido-produto.create",$pedido->id)}}">Cadastrar</a>
                                                </td>
                                            </tr>

                                            @endforeach

                                        </tbody>

                                </table>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $produtos->appends($request)->links()}}
        </div>
    </div>
</div>
@endsection