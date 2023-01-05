<?php

namespace App\Models\organization;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class BranchShift extends Model
{
    use HasFactory,HasTranslations;

    public $translatable = ['name'];
    public $guarded = [];
    // protected $casts =['days' => 'array'];
    public function getDaysAttribute($value)
    {
      return json_decode($value);
    }

    public function scopeWhenSearch($query,$search){
          return $query->when($search,function($q)use($search){
              return $q->where('from',$search)
                  ->orWhere('to','like',"%$search%")
                  ->orWhere('name','like',"%$search%");
          });
        }
    public function Organization()
    {
      return $this->belongsTo('App\Models\admin\Organization');
    }
    public function Branch()
    {
      return $this->belongsTo('App\Models\admin\Branch');
    }
 

}
