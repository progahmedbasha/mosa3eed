<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BranchAttendance extends Model
{
    use HasFactory;
    protected $fillable = [
    'organization_id',
    'branch_id',
    'user_id',
    'date',
    'time',
    'type',
];
    public function Organization()
    {
      return $this->belongsTo('App\Models\admin\Organization');
    }
    public function Branch()
    {
      return $this->belongsTo('App\Models\admin\Branch');
    }
    public function User()
    {
      return $this->belongsTo('App\Models\User');
    }
}