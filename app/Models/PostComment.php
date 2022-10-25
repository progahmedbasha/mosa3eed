<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostComment extends Model
{
    use HasFactory;
    public $guarded = [];

    public function JobPost()
    {
      return $this->belongsTo('App\Models\JobPost');
    }
    public function User()
    {
      return $this->belongsTo('App\Models\User');
    }
}
