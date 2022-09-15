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
    public $guarded = [];
    public $translatable = ['name'];

     public function scopeWhenSearch($query,$search){
        return $query->when($search,function($q)use($search){
            return $q->where(('email'),$search)
                ->orWhere('name','like',"%$search%")
                ->orWhere('phone_1','like',"%$search%")
                ->orWhere('phone_2','like',"%$search%")
                ->orWhere('address','like',"%$search%");
        });

        
    }
      public function Organization()
    {
      return $this->belongsTo('App\Models\admin\Organization');
    }
     public function District()
    {
      return $this->belongsTo('App\Models\District');
    }
}
