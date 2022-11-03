<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleBillProduct extends Model
{
    use HasFactory;
    public $guarded = [];

    public function scopeWhenSearch($query,$search){
      return $query->when($search,function($q)use($search){
          return $q->where(('price'),$search)
          ->orWhere('qty','like',"%$search%")
          ->orWhere('total_cost','like',"%$search%");
      });
    }
     public function Medicin()
    {
      return $this->belongsTo('App\Models\admin\Medicin');
    }
     public function SaleBill()
    {
      return $this->belongsTo('App\Models\SaleBill');
    }
}
