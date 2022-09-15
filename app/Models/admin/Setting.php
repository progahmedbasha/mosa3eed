<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    public $guarded = [];
    protected $table = "settings";
    use HasFactory;

    public function scopeWhenSearch($query,$search){
    return $query->when($search,function($q)use($search){
        return $q->where('key',$search)
            ->orWhere('value','like',"%$search%");
    });
    }

}
