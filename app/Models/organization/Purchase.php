<?php

namespace App\Models\organization;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;
      public $guarded = [];

        public function scopeWhenSearch($query,$search){
          return $query->when($search,function($q)use($search){
              return $q->where('qty',$search)
                  ->orWhere('type_measurement','like',"%$search%")
                  ->orWhere('acd','like',"%$search%")
                  ->orWhere('due_date','like',"%$search%");
          });
        }
      public function Branch()
    {
      return $this->belongsTo('App\Models\admin\Branch');
    }
      public function Organization()
    {
      return $this->belongsTo('App\Models\admin\Organization');
    }
        public function Medicin()
    {
      return $this->belongsTo('App\Models\admin\Medicin');
    }
}
