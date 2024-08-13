<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;
    protected $fillable = ['nome', 'descricao', 'peso', 'uf', "unidade_id"];
    public function rules(){
        return [
            "nome" => 'required|min:3|max:40',
            'descricao' => 'required',
            'uf' => 'required',
            'peso' => 'required|integer',
            'unidade_id' => 'exists:unidades,id'
        ];        
    }

    public function feedback(){
        return [
            'required' => 'O campo :attribute deve ser preenchido',
            'exists' => "O campo :attribute deve ser preenchido com dados validos",
            'integer' => "O campo :attribute deve do tipo numero",
        ];
    }

    public function produtoDetalhe(){
        return $this->hasOne("App\Models\ProdutoDetalhe");
    }

    public function pedidos(){
        return $this->belongsToMany("App\Models\Pedido", "pedidos_produtos", "produto_id", "pedido_id");
    }
}
