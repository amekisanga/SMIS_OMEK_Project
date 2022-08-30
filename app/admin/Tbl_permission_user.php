<?php

namespace App\admin;

use Illuminate\Database\Eloquent\Model;

class Tbl_permission_user extends Model
{
     protected  $fillable=['permission_id','user_id','grant'];
}
