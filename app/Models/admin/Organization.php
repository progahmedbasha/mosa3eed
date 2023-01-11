<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use App;
use DB;

class Organization extends Model
{
    use HasFactory,HasTranslations;
    public $guarded = [];
    public $translatable = ['name'];

       public function scopeWhenSearch($query,$search){
        return $query->when($search,function($q)use($search){
            return $q->where(('email'),$search)
                ->orWhere('name','like',"%$search%")
                ->orWhere('contact_name','like',"%$search%")
                ->orWhere('phone','like',"%$search%")
                ->orWhere('status','like',"%$search%")
                ->orWhere('address','like',"%$search%");
          });
          
      }

    public function User()
   {
     return $this->hasMany('App\Models\User');
   }

    public function Branch()
   {
     return $this->hasMany('App\Models\admin\Branch');
   }
    public function District()
    {
      return $this->belongsTo('App\Models\District');
    }
      public function OrganizationAdmin()
   {
     return $this->hasMany('App\Models\organization\OrganizationAdmin');
   }
}
