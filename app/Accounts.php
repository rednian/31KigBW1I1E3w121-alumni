<?php

namespace Alumni;

use Illuminate\Database\Eloquent\Model;
use Alumni\Stud_sch_info;

class Accounts extends Model
{

	protected $table = "accounts";
    protected $primaryKey = 'account_id';

	public $remember_token=false;
    
	public static function isRegistered(){
		return false;
	}

	public function alumnus_info(){
		return $this->belongsTo('Alumni\Stud_sch_info', 'ssi_id');
	}

	
		
}
