<?php

namespace Alumni;

use Illuminate\Database\Eloquent\Model;
use Alumni\Stud_sch_info;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


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

	public static function user_info(){
		$user 	=	Accounts::find(Auth::user()->account_id)->with('alumnus_info.student_per_info.stud_image',
																   'alumnus_info.student_per_info.contact_number.phone_numbers', 
																   'alumnus_info.student_per_info.email_address.emails', 
																   'alumnus_info.student_per_info.language_student.languages',
																   'alumnus_info.student_per_info.elementary_info',
																   'alumnus_info.student_per_info.citizenship',
																   'alumnus_info.stud_program.program_list',
																   'alumnus_info.student_per_info.parents_student.relationship',
																   'alumnus_info.student_per_info.parents_student.parent_info','alumnus_info.student_per_info.eligibilities',
																   'alumnus_info.student_per_info.work_experience',
																   'alumnus_info.student_per_info.services',
																   'alumnus_info.student_per_info.trainings',
																   'alumnus_info.student_per_info.affiliation',
																   'alumnus_info.student_per_info.awards',
																   'alumnus_info.student_per_info.skills', 
																   'alumnus_info.student_per_info.references', 
																   'alumnus_info.student_per_info.address'
																	)->whereHas('alumnus_info.stud_program', function($query){     
													                        $query->where('sch_year', '2017-2018')
														                    	  ->where('semester', '2nd')
														                    	  ->orderBy('semester', 'asc');
		                      										 })->first();
		return $user;
	}
		
}

// alumnus_info.student_per_info.elementary_info.elementary_address.address.barangay.city.provinces.region.country