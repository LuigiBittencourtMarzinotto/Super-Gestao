<form method="post" action="{{ $routeLink }}">
    @csrf
    @if(!empty($method))
        @method("PUT");
    @endif
    <input type="hidden" name="id" id="id" value="{{ $pedido->id ?? ""  }}">
    <label for="cliente_id">Informe o cliente</label>
    <select name="cliente_id" id="cliente_id">
        <option value="">...</option>
        @foreach($clientes as $key => $value)
            <option value="{{ $value->id }}" {{  (( old('cliente_id') == $value->id ) or ( !empty($pedido) and  $value->id  == $pedido->cliente_id)) ? 'selected' : '' }}>{{ $value->nome }}</option>                        
        @endforeach
    </select>
    @error('cliente_id')
    <div class="alert alert-danger">
        <p style="margin: 0px; padding:10px; color:red">{{ $message }}</p>
    </div>
    @enderror
    <button type="submit" class="borda-preta">
        {{ $msg }}
    </button>
</form>