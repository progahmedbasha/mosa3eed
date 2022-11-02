<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimelinePost extends Model
{
    public $guarded = [];
    use HasFactory;

    public function PostComment()
    {
      return $this->hasMany('App\Models\PostComment');
    //    return $this->hasMany(PostComment::class);
    }
    public function PostLike()
    {
      return $this->hasMany('App\Models\PostLike');
    }
     public function User()
    {
      return $this->belongsTo('App\Models\User');
    }
}
