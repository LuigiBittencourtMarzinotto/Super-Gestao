<?php

namespace App\Http\Controllers;

use App\Models\Login;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    public function index(Request $request){
        $erro = ($request->get("erro") == 1)? "Usuário e ou senha invalido" : "";
        $erro = ($request->get("erro") == 2)? "Necessario realizar login para acessar a pagina" : "";
        return view('site.login', ['erro' => $erro]);
    }

    public function autenticar(Request $request){
       $login = new Login;
       $request->validate($login->rules(),$login->feedback());
       $email = $request->get("usuario");
       $senha = $request->get("senha");
       $usuario = new User();
       $usuario = $usuario->where('email', $email )
                    ->where("password", $senha)
                    ->get()
                    ->first();
        if(!empty($usuario->name)){
            session_start();
            $_SESSION["logged"] = true;
            $_SESSION["user"] = ["nome" => $usuario->name, "email" => $usuario->email];
            return Redirect()->route("app.home");
        }else{
            return Redirect()->route("site.login",['erro' => 1]);
        }
    }

    public function sair(){
        session_destroy();
        return Redirect()->route("site.index");
        
    }
}
