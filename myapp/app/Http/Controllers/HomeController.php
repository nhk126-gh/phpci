<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Photo;
use Illuminate\Support\Facades\Storage;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $photos = Photo::all();
        return view('home',["photos" => $photos]);
    }

    public function upload(Request $request){

        // $this->validate($request, [
        //     'file' => ['required','file','image','mimes:jpeg,png']
        // ]);
        $this->validate($request, [
            'file' => ['required','file']
        ]);

        if ($request->file('file')->isValid([])) {

            $file_name = $request->file('file')->getClientOriginalName();
            // $request->file->storeAs('public',$file_name);
            // $path = asset('storage/' . $file_name);
            // Photo::insert(["name" => basename($path), "path" => $path]);

            $path_as = Storage::putFileAs('/public',$request->file('file'), $file_name);




            return redirect('home');
            
        }else{
            return redirect()->back()->withInput()->withErrors();
        }

    }

    public function check(){
        $file_path=Storage::disk('public')->files('texts')[0];
        echo $file_path;
        dd(Storage::url($file_path));
    }

    public function download(){
        $filePath = 'test_1.txt';
        $fileName = 'test_1.txt';
        $mimeType = Storage::mimeType($filePath);
        $headers = [['Content-Type' => $mimeType]];

        return Storage::download($filePath, $fileName, $headers);
    }
}
