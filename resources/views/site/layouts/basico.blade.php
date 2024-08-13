<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Super Gestão - @yield('title')</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="{{ asset('/style/custom.css') }}">
    </head>

    <body>
        <div class="topo">

            <div class="logo">
                <img src="{{ asset('/img/logo.png') }}">
            </div>

            <div class="menu">
                <ul>
                    <li><a href="{{ route('site.index') }}">Principal</a></li>
                    <li><a href="{{ route('site.sobrenos') }}">Sobre Nós</a></li>
                    <li><a href="{{ route('site.contato') }}">Contato</a></li>
                </ul>
            </div>
        </div>
        @yield("conteudo")

        @include('site.layouts._partials.footer');

    </body>
</html>
