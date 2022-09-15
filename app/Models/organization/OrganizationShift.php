<?php

namespace App\Models\organization;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class OrganizationShift extends Model
{
    use HasFactory,HasTranslations;

    public $translatable = ['name'];
    public $guarded = [];
    // protected $casts =['days' => 'array'];
    public function getDaysAttribute($value)
    {
      return json_decode($value);
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
