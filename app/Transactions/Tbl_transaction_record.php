<?php

namespace App\Transactions;

use Illuminate\Database\Eloquent\Model;

class Tbl_transaction_record extends Model
{
    //
	protected $fillable=['amount','company_id','facility_id','user_id','status','transaction_date','transaction_time'];
}
