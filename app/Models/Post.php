<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;


    protected $fillable = [
        'profile_id',
        'image',
        'caption',
        'comments',
        'likes',
        'unlikes',
    ];


    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

    public function like()
    {
        return $this->hasMany(Like::class);
    }

    public function unlike()
    {
        return $this->hasMany(Unlike::class);
    }

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }
}
