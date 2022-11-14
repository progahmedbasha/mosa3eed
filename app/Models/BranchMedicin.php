<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BranchMedicin extends Model
{
    use HasFactory;
    public $guarded = [];
    
    public function Medicin()
    {
      return $this->belongsTo('App\Models\admin\Medicin');
    }
}
