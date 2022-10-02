<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;
    public $guarded = [];
    public function UserType()
    {
      return $this->belongsTo('App\Models\admin\UserType');
    }
       public function scopeWhenSearch($query,$search){
        return $query->when($search,function($q)use($search){
            return $q->where(('subject'),$search)
                ->orWhere('status','like',"%$search%")
                ->orWhere('description','like',"%$search%")
                ->orWhere('price','like',"%$search%")
                ->orWhere('number_days','like',"%$search%")
                ->orWhere('offer','like',"%$search%");
        });
    }
}
