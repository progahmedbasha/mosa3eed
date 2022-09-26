<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
class JobTitle extends Model
{
    use HasFactory,HasTranslations;
    public $guarded = [];
    public $translatable = ['name'];

     public function scopeWhenSearch($query,$search){
        return $query->when($search,function($q)use($search){
            return $q->where(('related_to'),$search)
                ->orWhere('name','like',"%$search%");
        });
    }
}
