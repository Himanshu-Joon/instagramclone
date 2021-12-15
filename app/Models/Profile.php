<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        
        'name',
        'username',
        'bio',
        'email',
        'gender',
        'profile_pic',
        'posts',
        'followers',
        'following',

    ];
      


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function follower()
    {
        return $this->hasMany(Follower::class);
    }

    public function following()
    {
        return $this->hasMany(Following::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
