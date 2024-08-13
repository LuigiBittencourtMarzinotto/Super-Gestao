<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteContato extends Model
{
    use HasFactory;
    protected $table = 'site_contato';
    protected $fillable = ['nome', 'telefone', 'motivos_contatos_id', 'mensagem', 'email'];
     
    public function rules(){
        return[
            'nome' => 'required|unique:site_contato|min:3', 
            'telefone' => 'required',
            'motivo_mensagem' => 'required',
            'observacao' => 'required',
            'email' => 'email'
        ];
    }

    public function feedback(){
        return[
            'required' => 'O campo :attribute é obrigatorio'
        ];
    }

}