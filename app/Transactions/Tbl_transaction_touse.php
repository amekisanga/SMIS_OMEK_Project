<?php

namespace App\Transactions;

use Illuminate\Database\Eloquent\Model;

class Tbl_transaction_touse extends Model
{
    //
	protected $fillable=['amount','company_id','remain_amount','facility_id','user_id','status','transaction_date','transaction_time'];
}
