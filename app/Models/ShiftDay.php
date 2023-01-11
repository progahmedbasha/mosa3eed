<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShiftDay extends Model
{
    use HasFactory;
    public $guarded = [];

    public function BranchShift()
    {
      return $this->belongsTo('App\Models\BranchShift');
    }
  
}
