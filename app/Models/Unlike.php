<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unlike extends Model
{
    use HasFactory;

    protected $primaryKey = 'post_id';

    protected $fillable = [
        'post_id',
        'unliked_by',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
