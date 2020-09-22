<?php

namespace App\Http\Controllers;

use App\User;
use App\Bbs;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport; 

class UserController extends Controller
{

    
    //
    public function index($id){
        $bbs = User::find($id)->bbs;

        return view('bbs.user', ['bbs' => $bbs]);
    }

    public function export(){
        return Excel::download(new UsersExport, 'users.xlsx'); 
    }
}
