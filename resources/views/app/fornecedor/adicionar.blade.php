@extends('app.layouts.basico')
@section('titulo', 'Fornecedor')


@section('conteudo')

<div class="conteudo-pagina">
    <div class="titulo-pagina-app">
        <p>
            Fornecedor - {{ $msg }}
        </p>

    </div>
    @include('app.layouts._partials.fornecedor_menu')

    <div class="informacao-pagina">
        <div style="width:30%; margin: auto;">
            <form method="post" action="{{route('app.fornecedor.adicionar')}}">
                @csrf
                <input type="hidden" name="id" id="id" value="{{ $fornecedor->id ?? ""  }}">
                <input type="text" name="nome" id="nome" class="borda-preta" value="{{ $fornecedor->nome ?? old('nome') }}" placeholder="Nome">
                @error('nome')
                <div class="alert alert-danger">
                    <p style="margin: 0px; padding:10px; color:red">{{ $message }}</p>
                </div>
                @enderror
                <input type="text" name="site" id="site" class="borda-preta" value="{{ $fornecedor->site ?? old('site') }}" placeholder="Site">
                @error('site')
                <div class="alert alert-danger">
                    <p style="margin: 0px; padding:10px; color:red">{{ $message }}</p>
                </div>
                @enderror
                <input type="text" name="uf" id="uf" class="borda-preta" value="{{ $fornecedor->uf ?? old('uf') }}" placeholder="UF">
                @error('uf')
                <div class="alert alert-danger">
                    <p style="margin: 0px; padding:10px; color:red">{{ $message }}</p>
                </div>
                @enderror
                <input type="text" name="email" id="email" class="borda-preta" value="{{ $fornecedor->email ?? old('email') }}" placeholder="E-mail">
                @error('email')
                <div class="alert alert-danger">
                    <p style="margin: 0px; padding:10px; color:red">{{ $message }}</p>
                </div>
                @enderror
                <button type="submit" class="borda-preta">
                    {{ $msg }}
                </button>
            </form>
        </div>
    </div>
</div>

@endsection