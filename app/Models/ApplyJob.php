<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplyJob extends Model
{
    use HasFactory;
    public $guarded = [];
     public function User()
    {
      return $this->belongsTo('App\Models\User');
    }
     public function JobPost()
    {
      return $this->belongsTo('App\Models\JobPost');
    }
}
