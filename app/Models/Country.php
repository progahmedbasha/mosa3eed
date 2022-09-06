<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App;
use DB;
class Country extends Model
{
    use HasFactory;
     public function getNameAttribute($value) {
      return $this->{'name_' . App::getLocale()};
  }
    public function City()
    {
      return $this->hasMany('App\Models\City');
    }
}
