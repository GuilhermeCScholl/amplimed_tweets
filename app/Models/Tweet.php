<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
class Tweet extends Model
{
    use HasFactory;
    protected $fillable = [
        'content',
        'user_id',
        'count_likes',
    ];
    protected $appends = ['user_liked'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }   

    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    
    public function userLiked(): Attribute
    {
        return Attribute::get(function () {
            if (!auth()->check()) {
                return false;
            }

            return $this->likes()->where('user_id', auth()->id())->exists();
        });
    }
}
