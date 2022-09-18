<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

       public function scopeWhenSearch($query,$search){
          return $query->when($search,function($q)use($search){
              return $q->where(('name'),$search)
                  ->orWhere('email','like',"%$search%");
          });
       }

     public function UserType()
    {
      return $this->belongsTo('App\Models\admin\UserType');
    }
    
    public function Organization()
    {
      return $this->belongsTo('App\Models\admin\Organization');
    }
    public function District()
    {
      return $this->belongsTo('App\Models\District');
    }
}
