<?php

namespace App\Http\Controllers;

use App\Models\Follower;
use App\Models\Following;
use App\Models\Post;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']);

        return redirect()->route('login');
    }

    public function index()
    {
        $id = Auth::user()->id;
        $posts = Post::get();
        $profiles = Profile::get()->where('id','!=',$id);
        $followers = Follower::get();
        $followings = Following::get();
        return view('home',['posts'=>$posts,'profiles'=>$profiles,'followers'=>$followers,'followings'=>$followings]);
    }

    public function searchResults(Request $request)
    {
        $query = $request->get('query');
        $profiles = Profile::where('username',$query)->orWhere('name','like','%^'.$query.'%')->get();
        return view('results',['profiles'=>$profiles]);
    }
}
