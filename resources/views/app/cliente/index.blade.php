@extends('app.layouts.basico')
@section('titulo', 'Cliente')


@section('conteudo')

<div class="conteudo-pagina">
    <div class="titulo-pagina-app">
        <p>
            Cliente 
        </p>

    </div>
    @include('app.layouts._partials.cliente_menu', ['menu_nome' => "Cadastrar", "menu_link" => route("cliente.create")])

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
                            
                        </th>
                        <th>
                            
                        </th>
                        <th>
                            
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($clientes as $cliente)
                        <tr>
                            <td>
                                {{ $cliente->id }}
                            </td>
                            <td>
                                {{ $cliente->nome }}
                            </td>
                            </td>
                            <td>
                                <a href="{{ route('cliente.show', $cliente->id)}}">Visualizar dados</a>

                            </td>
                            <td>
                                <form id="form_{{$cliente->id}}" method="post" action="{{ route('cliente.destroy', $cliente->id)}}">
                                    @method('DELETE')
                                    @csrf
                                    <a href="#" onclick="document.getElementById('form_{{$cliente->id}}').submit()">Excluir</a>
                                </form>

                            </td>
                            <td>
                                <a href="{{ route('cliente.edit', $cliente->id)}}">Editar</a>    
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $clientes->appends($request)->links()}}
        </div>
    </div>
</div>
@endsection