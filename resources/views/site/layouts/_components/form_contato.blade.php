{{ $slot }}
@if(!empty($x))
{{$x}}
@endif
@if(!empty($y))
{{$y}}
@endif
<form action="{{ route('site.contato') }}" method="post">
    @csrf
    <input type="text" placeholder="Nome" value="{{old('nome')}}" class='{{ $class }}' id="nome" name="nome">
    @error('nome')
    <div class="alert alert-danger">
        <p style="margin: 0px; padding:10px; color:red">{{ $message }}</p>
    </div>
    @enderror

    <br>
    <input type="text" placeholder="Telefone" id="telefone" value="{{old('telefone')}}" name="telefone" class='{{ $class }}'>
    @error('telefone')
    <div class="alert alert-danger">
        <p style="margin: 0px; padding:10px; color:red">{{ $message}}</p>
    </div>
    @enderror
    <br>
    <input type="text" placeholder="E-mail" value="{{old('email')}}" id="email" name="email" class='{{ $class }}'>
    @error('email')
    <div class="alert alert-danger">
        <p style="margin: 0px; padding:10px; color:red">{{ $message }}</p>
    </div>
    @enderror
    <br>
    <select class='{{ $class }}' id="motivo_mensagem" name="motivo_mensagem">
        <option value="">Qual o motivo do contato?</option>
        @foreach($motivo_contatos as $motivo_contato):
        <option value="{{$motivo_contato->id}}" {{ (old('motivo_mensagem') == $motivo_contato->id)? 'selected' : '' }}>{{$motivo_contato->motivo_contato}}</option>
        @endforeach
    </select>
    @error('motivo_mensagem')
    <div class="alert alert-danger">
        <p style="margin: 0px; padding:10px; color:red">{{ $message }}</p>
    </div>
    @enderror
    <br>
    <textarea class='{{ $class }}' id="observacao" name="observacao">{{ (old('observacao') != '') ? old('observacao') : "Preencha aqui a sua mensagem"}}</textarea>
    @error('observacao')
    <div class="alert alert-danger">
        <p style="margin: 0px; padding:10px; color:red">{{ $message }}</p>
    </div>
    @enderror
    <br>
    <button type="submit" class='{{ $class }}'>ENVIAR</button>
</form>

