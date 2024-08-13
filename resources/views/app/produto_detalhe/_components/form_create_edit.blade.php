<form method="post" action="{{ $routeLink }}">
    @csrf
    @if(!empty($method))
        @method("PUT");
    @endif
    <input type="hidden" name="id" id="id" value="{{ $ProdutoDetalhe->id ?? ""  }}">
    
    <input type="text" name="comprimento" id="comprimento" class="borda-preta" value="{{ $ProdutoDetalhe->comprimento ?? old('comprimento') }}" placeholder="comprimento">
    @error('comprimento')
    <div class="alert alert-danger">
        <p style="margin: 0px; padding:10px; color:red">{{ $message }}</p>
    </div>
    @enderror
    <input type="text" name="largura" id="largura" class="borda-preta" value="{{ $ProdutoDetalhe->largura ?? old('largura') }}" placeholder="largura">
    @error('largura')
    <div class="alert alert-danger">
        <p style="margin: 0px; padding:10px; color:red">{{ $message }}</p>
    </div>
    @enderror
    <input type="text" name="altura" id="altura" class="borda-preta" value="{{ $ProdutoDetalhe->altura ?? old('altura') }}" placeholder="altura">
    @error('altura')
    <div class="alert alert-danger">
        <p style="margin: 0px; padding:10px; color:red">{{ $message }}</p>
    </div>
    @enderror
    <select name="produto_id" id="produto_id">
        <option value="">Selecione um produto</option>
        @foreach($produtos as $key => $value)
            <option value="{{ $value->id }}" {{  (( old('produto_id') == $value->id ) or ( !empty($ProdutoDetalhe) and  $value->id  == $ProdutoDetalhe->produto_id)) ? 'selected' : '' }}>{{ $value->nome }}</option>                        
        @endforeach
    </select>
    @error('produto_id')
    <div class="alert alert-danger">
        <p style="margin: 0px; padding:10px; color:red">{{ $message }}</p>
    </div>
    @enderror
    <button type="submit" class="borda-preta">
        {{ $msg }}
    </button>
</form>