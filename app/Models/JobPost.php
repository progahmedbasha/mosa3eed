<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class JobPost extends Model
{
    use HasFactory;
    public $guarded = [];

    public function scopeWhenSearch($query,$search){
        return $query->when($search,function($q)use($search){
            return $q->where(('subject'),$search)
                ->orWhere('address','like',"%$search%")
                ->orWhere('breif','like',"%$search%")
                ->orWhere('experince','like',"%$search%")
                ->orWhere('status','like',"%$search%")
                ->orWhere('expected_salary','like',"%$search%")
                ->orWhere('email_contract','like',"%$search%")
                ->orWhere('phone_contract','like',"%$search%");
        });
    }
    public function JobTitle()
    {
        return $this->belongsTo('App\Models\JobTitle');
    }
    public function Organization()
   {
     return $this->belongsTo('App\Models\admin\Organization');
   }
    public function Branch()
   {
     return $this->belongsTo('App\Models\admin\Branch');
   }
    public function District()
    {
      return $this->belongsTo('App\Models\District');
    }
       public function ApplyJob()
    {
      return $this->hasMany('App\Models\ApplyJob');
    }
    // public function PostComment()
    // {
    //   return $this->hasMany('App\Models\PostComment');
    // }
    //    public function PostLike()
    // {
    //   return $this->hasMany('App\Models\PostLike');
    // }
}
