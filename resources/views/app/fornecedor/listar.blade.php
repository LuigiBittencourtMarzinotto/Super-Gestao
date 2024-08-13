@extends('app.layouts.basico')
@section('titulo', 'Fornecedor')


@section('conteudo')

<div class="conteudo-pagina">
    <div class="titulo-pagina-app">
        <p>
            Fornecedor - Listar
        </p>

    </div>
    @include('app.layouts._partials.fornecedor_menu')

    <div class="informacao-pagina">
        <div style="width:90%; margin: auto;">
            <table border="1" width="100%" >
                <thead>
                    <tr>
                        <th>
                            ID
                        </th>
                        <th>
                            Site
                        </th>
                        <th>
                            UF
                        </th>
                        <th>
                            email
                        </th>
                        <th>
                            
                        </th>
                        <th>
                            
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($fornecedores as $fornecedor)
                        <tr>
                            <td>
                                {{ $fornecedor->id}}
                            </td>
                            <td>
                                {{ $fornecedor->nome}}
                            </td>
                            <td>
                                {{ $fornecedor->site}}
                            </td>
                            <td>
                                {{ $fornecedor->email}}
                            </td>
                            <td>
                                <a href="{{ route('app.fornecedor.excluir', $fornecedor->id)}}">Excluir</a>
                                
                            </td>
                            <td>
                                <a href="{{ route('app.fornecedor.editar', $fornecedor->id)}}">Editar</a>                        
                            </td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p>Lista de produtos</p>
                                <table border="1" style="margin:10px; width:98%">
                                    <thead>
                                        <tr>
                                            <th >ID</th>
                                            <th >NOME</th>
                                            <th >Descricao</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            @foreach($fornecedor->produtos as $produto)
                                        <tr>

                                            <td >
                                                {{ $produto->id}}
                                            </td>
                                            <td >
                                                {{ $produto->nome}}
                                            </td>
                                            <td >
                                                {{ $produto->descricao}}
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
            {{ $fornecedores->appends($request)->links()}}
        </div>
    </div>
</div>
@endsection