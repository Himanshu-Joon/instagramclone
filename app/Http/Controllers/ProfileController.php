<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{ 

    public function __construct()
    {
        $this->middleware(['auth']);

        return redirect()->route('login');
    }

    private $image;

    protected function getImage()
    {
        return $this->image;
    }

    protected function setImage($image)
    {
        $this->image = $image;
    }

    public function index()
    {   
        $user = Auth::user()->username;
        $profiles = Profile::get()->where('username',$user);


        $profile_id = Auth::user()->id;
        $posts = Post::get()->where('profile_id',$profile_id);

        return view('profile', ['profiles'=>$profiles], ['posts'=>$posts]);
    } 

    public function getprofile($id,$username)
    {
        $profiles = Profile::get()->where('username',$username);

        $posts = Post::get()->where('profile_id',$id);

        return view('profile',['profiles'=>$profiles],['posts'=>$posts]);
    }

    public function show($username)
    {
        $profiles = Profile::get()->where('username',$username);
        return view('editprofile', ['profiles' => $profiles]);
    }

    public function update(Request $request,$username)
    {

           $this->validate( $request ,[
           'name' => 'required',
           'username' => 'required',
           'email' => 'required|email',
           'gender' => 'required',
           'bio' => 'required', 
        ]);



        if($request->file('profile_pic') != null)
        {
            $name = $request->file('profile_pic')->getClientOriginalName();
            $this->setImage($name);
            $request->file('profile_pic')->storeAs('public/pics',$name);
     
        }else
        {   
            $name = "images.png";
            $this->setImage($name);
        }

        Profile::where('username',$username)->update([
            'name'=>$request->name,
            'username'=>$request->username,
            'email'=>$request->email,
            'gender'=>$request->gender,
            'bio'=>$request->bio,
            'profile_pic'=>$this->getImage(),
        ]);
        

        User::where('username',$username)->update([
            'name'=>$request->name,
            'username'=>$request->username,
            'email'=>$request->email,
        ]);

        return redirect('profile');
    }

}
