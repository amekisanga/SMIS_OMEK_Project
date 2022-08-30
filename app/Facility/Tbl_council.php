<?php

namespace App\Facility;

use Illuminate\Database\Eloquent\Model;

class Tbl_council extends Model
{
    //
	protected $fillable=['council_code','council_name','regions_id','council_types_id'];
}
