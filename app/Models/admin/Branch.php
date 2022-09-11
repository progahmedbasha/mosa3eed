<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use App;
use DB;
class Branch extends Model
{
    use HasFactory,HasTranslations;
    public $translatable = ['name'];
      public function Organization()
    {
      return $this->belongsTo('App\Models\admin\Organization');
    }
     public function District()
    {
      return $this->belongsTo('App\Models\District');
    }
}
