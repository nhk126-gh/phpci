<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class MathController extends Controller
{
    //
    public function sum($x,$y){
        $ans = $x + $y;
        return View::make('sum',['ans'=>$ans]);
    }
}
