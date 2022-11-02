<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
  public $guarded = [];
    use HasApiTokens, HasFactory, Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
      // Rest omitted for brevity

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
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
      public function ApplyJob()
    {
      return $this->hasMany('App\Models\ApplyJob');
    }
     public function TimelinePost()
    {
      return $this->hasMany('App\Models\TimelinePost');
    }
}
