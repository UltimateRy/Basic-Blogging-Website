<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Post extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function postImage()
    {
        return $this->hasOne(PostImage::class);
    }

    public function ownedBy($userId = null)
    {
         $userId = $userId ?: auth()->id();
         return $this->user_id === $userId;
    }
    
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'title',
        'contents',
    ];
}
