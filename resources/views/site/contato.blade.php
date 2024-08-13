
@extends('site.layouts.basico')

@section('title','Contato')

@section("conteudo")
<div class="conteudo-pagina">
    <div class="titulo-pagina">
        <h1>Entre em contato conosco</h1>
    </div>

    <div class="informacao-pagina">
        <div class="contato-principal">
            @component('site.layouts._components.form_contato', ["x"=> '1', 'y'=>'2', 'class'=>'borda-preta','motivo_contatos' => $motivos_contatos])
            <p>Entraremos em contato em até 2horas Deus abencoe.</p>
            @endcomponent
        </div>
    </div>
</div>
@endsection