<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedidoProduto extends Model
{
    use HasFactory;
    protected $table = "pedidos_produtos";
    protected $fillable = ["produto_id", "pedido_id", "quantidade"];
    public static function rules(){
        return [
            'quantidade' => 'required',
            'produto_id' => 'exists:produtos,id',
            'pedido_id' => 'exists:pedidos,id'
        ];        
    }

    public static function feedback(){
        return [
            'exists' => "O campo :attribute deve ser preenchido com dados validos",
            'required' => "O campo :attribute deve ser number"
        ];
    }
}
