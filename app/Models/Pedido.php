<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
    protected $fillable = ['cliente_id'];

    public static function rules()
    {
        return [
            'cliente_id' => 'exists:clientes,id'
        ];
    }

    public static function feedback(){
        return [
            'required' => 'O campo :attribute deve ser preenchido',
            'exists' => "O campo :attribute deve ser preenchido com dados validos",
            'integer' => "O campo :attribute deve do tipo numero",
        ];
    }

    public function produtos(){
        return $this->belongsToMany("App\Models\Item", "pedidos_produtos", "pedido_id", 'produto_id')->withPivot("id");
    }
}
