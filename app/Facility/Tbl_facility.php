<?php

namespace App\Facility;

use Illuminate\Database\Eloquent\Model;

class Tbl_facility extends Model
{
    //
    protected $fillable=['facility_code','facility_owner','facility_motto','facility_name','facility_type_id','address','mobile_number','email','council_id','region_id'];
}
