<form method="post" action="{{ $routeLink }}">
    @csrf
    @if(!empty($method))
        @method("PUT");
    @endif
    <input type="hidden" name="id" id="id" value="{{ $cliente->id ?? ""  }}">
    <input type="text" name="nome" id="nome" class="borda-preta" value="{{ $cliente->nome ?? old('nome') }}" placeholder="Nome">
    @error('nome')
    <div class="alert alert-danger">
        <p style="margin: 0px; padding:10px; color:red">{{ $message }}</p>
    </div>
    @enderror

    <button type="submit" class="borda-preta">
        {{ $msg }}
    </button>
</form>