<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use App;
use DB;
class Medicin extends Model
{
    use HasFactory,HasTranslations;
    public $guarded = [];
    public $translatable = ['name'];
    //  if(App::getLocale() == 'en')
    //     {
    //         return $this->attributes['name:en'];
    //     }
    //   public function getNameAttribute($value) {
    //     return App::getLocale() == 'en' ? $this->name['en']: $this->name['ar'];  
    //     }
            // public function getNameAttribute($value) {
            //     // ('name', 'en')
            //     return $this->{'name', . App::getLocale()};
            // }
      public function scopeWhenSearch($query,$search){
            return $query->when($search,function($q)use($search){
                return $q->where('price',$search)
                    ->orWhere('name','like',"%$search%")
                    ->orWhere('barcode','like',"%$search%");
            });
         }
}
