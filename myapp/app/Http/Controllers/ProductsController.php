<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ProductsImport;
use App\Product;

class ProductsController extends Controller
{
    //
    public function index(){
        return view('index');
    }

    public function store(Request $request){
    
        $file = $request->file('file');
        Excel::import(new ProductsImport, $file);
    }
}
