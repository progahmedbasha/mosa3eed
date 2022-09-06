<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App;
use DB;
class City extends Model
{
    use HasFactory;
       public function getNameAttribute($value) {
      return $this->{'name_' . App::getLocale()};
  }

    public function Country()
    {
      return $this->belongsTo('App\Models\Country');
    }
   
    public function District()
    {
      return $this->hassMany('App\Models\District');
    }
}
