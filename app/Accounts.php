<?php

namespace Alumni;

use Illuminate\Database\Eloquent\Model;
use Alumni\Stud_sch_info;

class Accounts extends Model
{

	protected $table = "accounts";
  protected $primaryKey = 'account_id';
  protected $fillable = ['account_type','username','password','ss_id','company_id'];


	public $remember_token=false;

	protected function company()
	{
		return $this->belongsTo(Company::class,'account_id','company_id');
	}

    
	public static function isRegistered(){
		return false;
	}

	public function alumnus_info(){
		return $this->belongsTo('Alumni\Stud_sch_info', 'ssi_id');
	}

	

	public function logout(){

		Auth::logout();
		return redirect()->route('/');

	}
		
}