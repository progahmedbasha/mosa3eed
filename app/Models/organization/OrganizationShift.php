<?php

namespace App\Models\organization;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganizationShift extends Model
{
    use HasFactory;
       public function Shift()
    {
      return $this->belongsTo('App\Models\organization\Shift');
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
