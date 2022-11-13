<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserBranch extends Model
{
    use HasFactory;
    public $guarded = [];

       public function Branch()
    {
      return $this->belongsTo('App\Models\admin\Branch');
    }
       public function User()
    {
      return $this->belongsTo('App\Models\User');
    }
}
