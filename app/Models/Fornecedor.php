<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fornecedor extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'fornecedores';
    protected $fillable = ['nome', 'site', 'uf', 'email'];

    public function rules(){
        return [
            "nome" => 'required|min:3|max:40',
            'site' => 'required',
            'uf' => 'required',
            'email' => 'email'
        ];        
    }

    public function feedback(){
        return [
                'required' => 'O campo :attribute deve ser preenchido',
                'email' => "O campo e-mail deve ser preenchido com dados validos"
        ];
    }

    public function produtos(){
        return $this->hasMany("App\Models\Item", "fornecedor_id", 'id');
    }

}
