<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $fillable = ['nome', 'descricao', 'peso', 'uf', "unidade_id", "fornecedor_id"];
    protected $table = "produtos";
    static function rules(){
        return [
            "nome" => 'required|min:3|max:40',
            'descricao' => 'required',
            'uf' => 'required',
            'peso' => 'required|integer',
            'fornecedor_id' => 'exists:fornecedores,id',
            'unidade_id' => 'exists:unidades,id'
        ];        
    }

    static function feedback(){
        return [
            'required' => 'O campo :attribute deve ser preenchido',
            'exists' => "O campo :attribute deve ser preenchido com dados validos",
            'integer' => "O campo :attribute deve do tipo numero",
        ];
    }

    public function produtoDetalhe(){
        return $this->hasOne("App\Models\ItemDetalhe", "produto_id", "id");
    }

    public function fornecedor(){
        return $this->belongsTo("App\Models\Fornecedor", "fornecedor_id", "id");
    }

    public function pedidos(){
        return $this->belongsToMany("App\Models\Pedido", "pedidos_produtos", "produto_id", "pedido_id")->withPivot("created_at");
    }
}
