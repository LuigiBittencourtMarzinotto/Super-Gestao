@extends('site.layouts.basico')

@section('title','Login')

@section("conteudo")
<div class="conteudo-pagina">
    <div class="titulo-pagina">
        <h1>Login</h1>
    </div>

    <div class="informacao-pagina">
        <div style="width: 30vw; margin:auto">
            <form action="{{route('site.login')}}" method="post">
                @csrf
                <input type="text" name="usuario" value="{{ old('usuario') }}" placeholder="Usuario" class="borda-preta">
                @error('usuario')
                <div class="alert alert-danger">
                    <p style="margin: 0px; padding:10px; color:red">{{ $message }}</p>
                </div>
                @enderror
                <input type="password" name="senha" value="{{ old('senha') }}" placeholder="Senha" class="borda-preta">
                @error('senha')
                <div class="alert alert-danger">
                    <p style="margin: 0px; padding:10px; color:red">{{ $message }}</p>
                </div>
                @enderror
                @if(!empty($erro))
                    {{$erro}}
                @endif
                <button type="submit" class="borda-preta">Acessar</button>
            </form>
        </div>
    </div>
</div>
@endsection
