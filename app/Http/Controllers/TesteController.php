<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TesteController extends Controller
{
    function teste(int $p1 = 0, int $p2 = 0){
        // echo $p1, $p2;
        return view("site.teste", ['p1' => $p1, 'p2' => $p2]);
    }
}
