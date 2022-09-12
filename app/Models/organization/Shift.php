<?php

namespace App\Models\organization;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
class Shift extends Model
{
    use HasFactory,HasTranslations;
    public $translatable = ['name'];
}
