<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemDetalhe extends Model
{
    use HasFactory;
    protected $fillable = ['produto_id', 'comprimento', 'largura', 'altura'];
     protected $table = "produto_detalhes"; 
    public function rules(){
        return [
            "comprimento" => 'required|integer',
            'largura' => 'required|integer',
            'altura' => 'required|integer',
            'produto_id' => 'exists:produtos,id'
        ];        
    }

    public function feedback(){
        return [
            'required' => 'O campo :attribute deve ser preenchido',
            'exists' => "O campo :attribute deve ser preenchido com dados validos",
            'integer' => "O campo :attribute deve do tipo numero",
        ];
    }

    public function produto(){
        return $this->belongsTo("App\Models\Item", "produto_id", "id");
    }
}
