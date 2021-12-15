<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']);

        return redirect()->route('login');
    }
    public function index($id)
    {   
        $profiles = Profile::get();
        $comments = Comment::get()->where('post_id',$id);
        return view('comment',['id'=>$id,'comments'=>$comments],['profiles'=>$profiles]);
    }

    public function store(Request $request)
    {
        $profile_id = Auth::user()->id;
        $this->validate($request,[
            'comment'=>'required',
        ]);

        Comment::create([
            'post_id'=>$request->post_id,
            'profile_id'=>$profile_id,
            'comment'=>$request->comment,
        ]);

        Post::where('id',$request->post_id)->increment('comments');

        return redirect()->route('home');
    }
}
