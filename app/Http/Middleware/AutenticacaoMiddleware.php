<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AutenticacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $tipo_autenticacao, $tipo_perfil ): Response
    {
        session_start();
        if(!empty($_SESSION["logged"])){
            return $next($request);
        }else{
            return Redirect()->route("site.login",['erro' => 2]);
        }
    }
}
