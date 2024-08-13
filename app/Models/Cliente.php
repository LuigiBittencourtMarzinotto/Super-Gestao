<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $fillable = ["nome"];

    public static function rules(){
        return [
            "nome" => "required"
        ];
    }

    public static function feedback(){
        return [
            'required' => "O :attribute deve ser preenchido"
        ];
    }
}
