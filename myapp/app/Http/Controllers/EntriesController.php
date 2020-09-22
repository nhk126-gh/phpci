<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entry;

class EntriesController extends Controller
{
    //
    public function index(){
        $entries = Entry::orderBy('id', 'asc')->get();

        return view('entries.index',['entries'=>$entries]);
    }

    public function view($id){
        $entries = Entry::all();
        $entry = Entry::findOrFail($id);

        return view('entries.view',['entries'=>$entries,'entry'=>$entry]);
    }
}
