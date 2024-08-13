@extends('app.layouts.basico')
@section('titulo', 'Fornecedor')


@section('conteudo')

<div class="conteudo-pagina">
    <div class="titulo-pagina-app">
        <p>
            Fornecedor
        </p>

    </div>
    @include('app.layouts._partials.fornecedor_menu')

    <div class="informacao-pagina">
        <div style="width:30%; margin: auto;">
            <form method="post" action="{{route('app.fornecedor.listar')}}">
                @csrf
                <input type="text" name="nome" id="nome" class="borda-preta" placeholder="Nome">
                <input type="text" name="site" id="site" class="borda-preta" placeholder="Site">
                <input type="text" name="uf" id="uf" class="borda-preta" placeholder="UF">
                <input type="text" name="email" id="email" class="borda-preta" placeholder="E-mail">
                <button type="submit" class="borda-preta">
                    Pesquisar
                </button>
            </form>

        </div>

    </div>


</div>

@endsection