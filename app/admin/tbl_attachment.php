<?php

namespace App\admin;

use Illuminate\Database\Eloquent\Model;

class tbl_attachment extends Model
{
    protected  $fillable=['file_path','describtion','patient_id'];
}
