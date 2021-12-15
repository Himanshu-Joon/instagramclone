<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Like;
use App\Models\Unlike;
use App\Models\Post;
use Illuminate\Http\Request;

class LikeUnlikeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);

        return redirect()->route('login');
    }
    public function Like(Request $request,$id)
    {  
        $profile_id = Auth::user()->id;

            $unlike = $this->findUnlikedPost($id);
            $liked = $this->findLikedPost($id);

            if($unlike === null and $liked === null)
            {
                Post::where('id',$id)->increment('likes');

                Like::create([
                    'post_id'=> $id,
                    'liked_by'=>$profile_id,
                    
                ]);

                return redirect()->route('home');
            }elseif($unlike !== null)
            {
                Post::where('id',$id)->decrement('unlikes');
                Post::where('id',$id)->increment('likes');

                Unlike::where('post_id',$id)->delete();

                Like::create([
                    'post_id'=>$id,
                    'liked_by'=>$profile_id,
                ]);

                return redirect()->route('home');
            }else
            {
                return redirect()->route('home');
            }
        
        
        
    
    }

    public function unlike(Request $request,$id)
    {
        $profile_id = Auth::user()->id;
        
                $liked = $this->findLikedPost($id);
                $unliked = $this->findUnlikedPost($id);
                if($liked === null and $unliked === null)
                {
                    Post::where('id',$id)->increment('unlikes');

                    Unlike::create([
                        'post_id'=>$id,
                        'unliked_by'=>$profile_id,
                    ]);

                    return redirect()->route('home');

                }elseif($liked !== null)
                {
                    Post::where('id',$id)->decrement('likes');
                    Post::where('id',$id)->increment('unlikes');

                    Like::where('post_id',$id)->delete();

                    Unlike::create([
                        'post_id'=>$id,
                        'unliked_by'=>$profile_id,
                    ]);

                    return redirect()->route('home');
                }else
                {
                    return redirect()->route('home');
                }
    }

    public function findLikedPost($id)
    {
        $liked = Like::find($id);
        return $liked;
    }

    public function findUnlikedPost($id)
    {
        $unliked = Unlike::find($id);
        return $unliked;
    }
}
