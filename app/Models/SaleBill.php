<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleBill extends Model
{
    use HasFactory;
    public $guarded = [];

    public function scopeWhenSearch($query,$search){
      return $query->when($search,function($q)use($search){
          return $q->where(('bill_number'),$search)
          ->orWhere('status','like',"%$search%");
      });
    }
    
    public function User()
    {
      return $this->belongsTo('App\Models\User');
    }
    
    public function SaleBillProduct()
    {
      return $this->hasMany('App\Models\SaleBillProduct');
    }
      public function Branch()
    {
      return $this->belongsTo('App\Models\admin\Branch');
    }
}
