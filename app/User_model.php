<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class User_model extends Model
{
   public static function getuserData(){
    $value = DB::table('users')->orderBy('id', 'asc')->get();
    return $value;
  }
}
