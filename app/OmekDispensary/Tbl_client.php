<?php

namespace App\OmekDispensary;

use Illuminate\Database\Eloquent\Model;

class Tbl_client extends Model
{
    //
	protected $fillable=['client_name','client_registration_no','client_age','client_mobile','facility_id'
	,'user_id','gender_id','occupation_id','residence_id'];
	
}
