<?php

namespace App\Models\organization;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App;
use DB;
class OrganizationAdmin extends Model
{
    use HasFactory;
     public $guarded = [];
     public function User()
    {
      return $this->belongsTo('App\Models\User');
    }
      public function Organization()
    {
      return $this->belongsTo('App\Models\admin\Organization');
    }
    //    public function Branch()
    // {
    //   return $this->belongsTo('App\Models\admin\Branch');
    // }
      public function OrganizationShift()
    {
      return $this->belongsTo('App\Models\organization\OrganizationShift');
    }
}
