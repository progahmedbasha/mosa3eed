<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use App;
use DB;
class district extends Model
{
    use HasFactory,HasTranslations;
    public $translatable = ['name'];

    public function City()
    {
      return $this->belongsTo('App\Models\City');
    }
        public function User()
    {
      return $this->hassMany('App\Models\User');
    }
  
}
