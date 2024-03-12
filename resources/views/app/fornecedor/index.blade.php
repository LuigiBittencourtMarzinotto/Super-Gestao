@if($fornecedores)

    @foreach($fornecedores as $fornecedor)
        
        @switch($fornecedor['ddd'])
            @case("11")
                {{$UF = 'SP'}}
                @break
            @case('32')
                {{ $UF =  'MG'}}
                @break
            @case('43')
                {{ $UF = 'PR' }}
                @break
            @default
                {{ $UF = 'estado nao encontrado' }}
                
        @endswitch
        Nome: {{ $fornecedor['nome'] ?? ""}}
        <br>
        Cnpj: {{ $fornecedor['cnpj'] ?? "" }}
        <br>
        DDD: ({{ $fornecedor['ddd'] ?? "" }})
        <br>
        Estado: {{ $UF}}
        <hr>
    @endforeach


@endif