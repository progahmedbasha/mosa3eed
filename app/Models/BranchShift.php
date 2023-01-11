<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BranchShift extends Model
{
    use HasFactory;
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
    public function ShiftDay()
    {
      return $this->hasMany('App\Models\ShiftDay');
    }
    public function Branch()
    {
      return $this->belongsTo('App\Models\admin\Branch');
    }
 

}
