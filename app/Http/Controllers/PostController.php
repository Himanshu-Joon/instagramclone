<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Profile;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);

        return redirect()->route('login');
    }
    public function index()
    {
        return view('post');

    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'image'=>'required',
            'caption'=>'required',
        ]);
        
        

        $name = $request->file('image')->getClientOriginalName();
        $size = $request->file('image')->getSize();

        $id = auth()->user()->id;

        Post::create([
            'profile_id'=>$id,
            'image'=>$name,
            'caption'=>$request->caption,
        ]);

        Profile::where('id',$id)->increment('posts');

        $request->file('image')->storeAs('public/pics',$name);

        return redirect()->route('profile');




    }

}
