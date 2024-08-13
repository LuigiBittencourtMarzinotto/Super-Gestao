<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    use HasFactory;
    protected $fillable = ["user", "password"];

    public function rules(){
        return [
            "usuario" => 'required|email',
            "senha" => 'required'
        ];
    }

    public function feedback(){
        return [
            "required" => "O campo :attribute é obrigatorio" ,
            "email" => "O e-mail nao e valido" , 
        ]; 
    }
}
