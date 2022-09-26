<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MissedItem extends Model
{
    public $guarded = [];
    use HasFactory;
    
    public function Medicin()
    {
      return $this->belongsTo('App\Models\admin\Medicin');
    }
   
    public function User()
    {
      return $this->belongsTo('App\Models\User');
    }
    public function Branch()
    {
      return $this->belongsTo('App\Models\admin\Branch');
    }
}
