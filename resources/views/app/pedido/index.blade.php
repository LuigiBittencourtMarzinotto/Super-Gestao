@extends('app.layouts.basico')
@section('titulo', 'pedido')


@section('conteudo')

<div class="conteudo-pagina">
    <div class="titulo-pagina-app">
        <p>
            pedido 
        </p>

    </div>
    @include('app.layouts._partials.pedido_menu', ['menu_nome' => "Cadastrar", "menu_link" => route("pedido.create")])

    <div class="informacao-pagina">
        <div style="width:90%; margin: auto;">
            <table border="1" width="100%" >
                <thead>
                    <tr>
                        <th>
                            ID
                        </th>
                        <th>
                            id cliente
                        </th>
                        <th>
                            
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
                    @foreach($pedidos as $pedido)
                        <tr>
                            <td>
                                {{ $pedido->id }}
                            </td>
                            <td>
                                {{ $pedido->cliente_id }}
                            </td>
                            <td>
                                <a href="{{ route('pedido-produto.create', $pedido->id)}}">Adicionar Produtos</a>
                            </td>
                            <td>
                                <a href="{{ route('pedido.show', $pedido->id)}}">Visualizar dados</a>
                            </td>
                            <td>
                                <form id="form_{{$pedido->id}}" method="post" action="{{ route('pedido.destroy', $pedido->id)}}">
                                    @method('DELETE')
                                    @csrf
                                    <a href="#" onclick="document.getElementById('form_{{$pedido->id}}').submit()">Excluir</a>
                                </form>

                            </td>
                            <td>
                                <a href="{{ route('pedido.edit', $pedido->id)}}">Editar</a>    
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $pedidos->appends($request)->links()}}
        </div>
    </div>
</div>
@endsection