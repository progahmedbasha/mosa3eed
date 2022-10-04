<?php

namespace App\Http\Controllers\API;
use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(){
        parent::__construct();
       // $this->middleware('jwt');
    }

    // public function home (){
    //     $users = User::all();
    //     return $this->toJson(200,"Success",$users);
        
    // }
}
