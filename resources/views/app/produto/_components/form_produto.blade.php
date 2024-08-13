<form method="post" action="{{ $routeLink }}">
    @csrf
    @if(!empty($method))
        @method("PUT");
    @endif
    <input type="hidden" name="id" id="id" value="{{ $produto->id ?? ""  }}">
    <input type="text" name="nome" id="nome" class="borda-preta" value="{{ $produto->nome ?? old('nome') }}" placeholder="Nome">
    @error('nome')
    <div class="alert alert-danger">
        <p style="margin: 0px; padding:10px; color:red">{{ $message }}</p>
    </div>
    @enderror
    <select name="fornecedor_id" id="fornecedor_id">
        <option value="">...</option>
        @foreach($fornecedores as $key => $value)
            <option value="{{ $value->id }}" {{  (( old('fornecedor_id') == $value->id ) or ( !empty($produto) and  $value->id  == $produto->fornecedor_id)) ? 'selected' : '' }}>{{ $value->nome }}</option>                        
        @endforeach
    </select>
    @error('fornecedor_id')
    <div class="alert alert-danger">
        <p style="margin: 0px; padding:10px; color:red">{{ $message }}</p>
    </div>
    @enderror
    <input type="text" name="descricao" id="descricao" class="borda-preta" value="{{ $produto->descricao ?? old('descricao') }}" placeholder="Descricao">
    @error('descricao')
    <div class="alert alert-danger">
        <p style="margin: 0px; padding:10px; color:red">{{ $message }}</p>
    </div>
    @enderror
    <input type="text" name="peso" id="peso" class="borda-preta" value="{{ $produto->peso ?? old('peso') }}" placeholder="Peso">
    @error('peso')
    <div class="alert alert-danger">
        <p style="margin: 0px; padding:10px; color:red">{{ $message }}</p>
    </div>
    @enderror
    <input type="text" name="uf" id="uf" class="borda-preta" value="{{ $produto->uf ?? old('uf') }}" placeholder="UF">
    @error('uf')
    <div class="alert alert-danger">
        <p style="margin: 0px; padding:10px; color:red">{{ $message }}</p>
    </div>
    @enderror
    <select name="unidade_id" id="unidade_id">
        <option value="">...</option>
        @foreach($unidades as $key => $value)
            <option value="{{ $value->id }}" {{  (( old('unidade_id') == $value->id ) or ( !empty($produto) and  $value->id  == $produto->unidade_id)) ? 'selected' : '' }}>{{ $value->descricao }}</option>                        
        @endforeach
    </select>
    @error('unidade_id')
    <div class="alert alert-danger">
        <p style="margin: 0px; padding:10px; color:red">{{ $message }}</p>
    </div>
    @enderror
    <button type="submit" class="borda-preta">
        {{ $msg }}
    </button>
</form>