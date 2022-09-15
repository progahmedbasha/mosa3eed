<?php

namespace App\Models\organization;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;
      public $guarded = [];
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
