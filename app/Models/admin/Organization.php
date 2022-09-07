<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use App;
use DB;

class Organization extends Model
{
    use HasFactory,HasTranslations;

    public $translatable = ['name','contact_name'];

      public function User()
   {
     return $this->hasMany('App\Models\User');
   }
     public function District()
    {
      return $this->belongsTo('App\Models\District');
    }
}
