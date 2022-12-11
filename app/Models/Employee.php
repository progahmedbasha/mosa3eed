<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    public $guarded = [];
    public function Organization()
    {
      return $this->belongsTo('App\Models\admin\Organization');
    }
    public function Branch()
    {
      return $this->belongsTo('App\Models\admin\Branch');
    }
}
