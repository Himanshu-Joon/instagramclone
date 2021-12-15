<?php

namespace App\Http\Controllers;

use App\Models\Follower;
use App\Models\Following;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowActionController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']);

        return redirect()->route('login');
    }

    public function follow(Request $request,$profile_id)
    {

        if($request->follow = 'follow')
        {
            $user_id = Auth::user()->id;

            Profile::where('id',$profile_id)->increment('followers');
            Profile::where('id',$user_id)->increment('following');

            Follower::create([
                'profile_id'=>$profile_id,
                'followed_by'=>$user_id,
            ]);

            Following::create([
                'profile_id'=>$user_id,
                'following'=>$profile_id,
            ]);

            return redirect()->back();
        }

        
    }

    public function unfollow(Request $request, $profile_id)
    {
        if($request->unfollow = 'unfollow')
        {
            $user_id = Auth::user()->id;

            Profile::where('id',$profile_id)->decrement('followers');
            Profile::where('id',$user_id)->decrement('following');

            Follower::where('profile_id',$profile_id)->delete();
            Following::where('following',$profile_id)->delete(); 

            return redirect()->back();
        }
    }


    public function followers($id)
    {
        $profiles = Profile::get();
        $followers = Follower::get()->where('profile_id',$id);
        return view('followers',['followers'=>$followers,'profiles'=>$profiles]);
    }

    public function following($id)
    {
        $profiles = Profile::get();
        $followings = Following::get()->where('profile_id',$id);
        return view('following',['followings'=>$followings,'profiles'=>$profiles]);
    }
}
