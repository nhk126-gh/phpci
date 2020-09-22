<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Bbs;
use Auth;
use Gate;
use App\Events\MessageCreated;
use App\Events\MakeBbs;

class BbsController extends Controller
{
    //
    public function index(){
        
        // $bbs = Bbs::paginate(10);
        $bbs = Bbs::all();
        return view('bbs.index', ["bbs" => $bbs]);

    }

    public function create(Request $request) {

        $request->validate([
            'comment' => 'required|min:1|max:140'
        ]);
        
        $data = $request->all();
        $comment = $data['comment'];
        $id = Auth::user()->id;
        $bbs = Bbs::create(["user_id" => $id, "comment" => $comment]);
        
        event(new MakeBbs($bbs));
    }

    public function single($id){

        $bbs = Bbs::find($id);
        if(!$bbs){
            abort(404);
        }
        
        return view('bbs.single',["bbs"=>$bbs]);
    }

    public function like(Bbs $bbs){
        $user_id = Auth::user()->id;
        $user_name = Auth::user()->name;
        $users = $bbs->users();

        Gate::authorize('like', $bbs);
        
        if($users->where('user_id',$user_id)->exists()){
            $users->detach($user_id);
        }else{
            $users->attach($user_id);
        }
        
        event(new MessageCreated($bbs));

    }

    public function destroy(Bbs $bbs){

        Gate::authorize('update-post', $bbs);
        
        $bbs->delete();

        return redirect('bbs');
    }

}
