<p><strong>ID do Pedido :</strong> <span>{{$pedido->id}}</span></p>
<p><strong>ID do cliente :</strong> <span>{{$pedido->cliente_id}}</span></p>
<p><strong>Produtos Cadastrados :</strong> </p>
<table border="1" width="100%" style="margin-bottom:30px">
<thead>
    <tr>
    <th>
        ID
    </th>
    <th>
        Produto
    </th>
    <th>
        Descricao
    </th>
    <th>
        
    </th>
</tr>
</thead>
<tbody>
    @foreach($pedido->produtos as $produto)
    <tr>
        <td>
            {{$produto->id}}
        </td>
        <td>
            {{$produto->nome}}
        </td>
        <td>
            {{$produto->descricao}}
        </td>
        <td>
            <form id="form_{{$produto->pivot->id}}" method="post" action="{{ route('pedido-produto.destroy', ['pedidoProduto' => $produto->pivot->id, 'pedido' => $pedido->id])}}">
                @method('DELETE')
                @csrf
                <a href="#" onclick="document.getElementById('form_{{$produto->pivot->id}}').submit()">Excluir</a>
            </form>
        </td>
    </tr>        
    @endforeach
</tbody>
</table>

<form method="post" action="{{ $routeLink }}">
    @csrf
    @if(!empty($method))
    @method("PUT");
    @endif
    <input type="hidden" name="id" id="id" value="{{ $pedido->id ?? ""  }}">

    <label for="produto_id">Informe o Produto</label>
    <select name="produto_id" id="produto_id">
        <option value="">...</option>
        @foreach($produtos as $key => $value)
            <option value="{{ $value->id }}" {{  (( old('produto_id') == $value->id ) or ( !empty($pedido) and  $value->id  == $pedido->produto_id)) ? 'selected' : '' }}>{{ $value->nome }}</option>                        
        @endforeach
    </select>
    @error('produto_id')
    <div class="alert alert-danger">
        <p style="margin: 0px; padding:10px; color:red">{{ $message }}</p>
    </div>
    @enderror

    <label for="quantidade">Informe a Qtd</label>
    <input type="number" name="quantidade" id="quantidade" value="{{ $pedido->quantidade ?? old('quantidade') }}" placeholder="Quantidade" class="borda-preta">
    @error('quantidade')
    <div class="alert alert-danger">
        <p style="margin: 0px; padding:10px; color:red">{{ $message }}</p>
    </div>
    @enderror
    <button type="submit" class="borda-preta">
        {{ $msg }}
    </button>
</form>