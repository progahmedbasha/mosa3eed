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
    public $translatable = ['name'];
}
