<?php

namespace Alumni\Http\Controllers\Alumnus;

use Illuminate\Http\Request;
use Alumni\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;
use Alumni\Accounts;
use Alumni\Graduates;
use Alumni\Country;
use Alumni\Stud_per_info;
use Alumni\Citizenship;
use Alumni\Student_phone;
use Alumni\Phone_numbers;
use Alumni\Email_student;
use Alumni\Emails;
use Alumni\Language_student;
use Alumni\Languages;
use Alumni\S_main_address;
use Alumni\Eligibilities;
use Alumni\Work_experiences;
use Alumni\Service;
use Alumni\Skills;

class ProfileController extends Controller
{
    public function index(){

    	if(Auth::check()){
	    	$user 			 = Accounts::user_info();
	    	$graduation_info = Graduates::grad_alumnus_info(Auth::user()->ssi_id);
	    	$list_country 	 = Country::all();
	    	// dd($user->alumnus_info->student_per_info->skills);
     		return view('alumnus/profile', compact('user', 'graduation_info', 'list_country'));
    	}
    	else{
			return redirect()->route('login');
    	}

    }

    public function update_personal_info(Request $request){
    	
    	$gender		 		= $request->input('gender'); 
		$birthplace	 		= $request->input('birthplace'); 
		$birthdate	 		= $request->input('birthdate'); 
		$nationality 		= $request->input('nationality'); 
		$status		 		= $request->input('status'); 
		$religion	 		= $request->input('religion'); 
		$mobile_number 		= $request->input('mobile_number'); 
		$tel_number	   		= $request->input('tel_number'); 
		$email_address 		= $request->input('email_address'); 
		$languages	   		= $request->input('languages'); 
		$present_address 	= $request->input('present_address'); 
		$permanent_address  = $request->input('permanent_address');
		$spi_id				= $request->input('spi_id'); 

		// :::::  Student Per Info ::::::::::::::::::::::::::::::::::::::::::::::::::::::

		$citizenship   = Citizenship::where(["nationality" => $nationality])->first();
		$cit_id = "";

		if($citizenship){
			$cit_id = $citizenship->cit_id;	
		}
		else{
			$cit_id = Citizenship::insertGetId(["nationality" => $nationality]);
		}

		$stud_per_info = Stud_per_info::find($spi_id)->update([
																'birthdate'    => $birthdate,
																'birthplace'   => $birthplace,
																'gender' 	   => $gender,
																'civ_status' => $status,
																'religion'	   => $religion,
																'cit_id'  	   => $cit_id
															  ]);
		

		// ::::: Address ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::		
		$pres_address = S_main_address::where(["spi_id" => $spi_id, "address_type" => "presentAddress"])->update([
																											"address" => $present_address
																										]);

		$perm_address = S_main_address::where(["spi_id" => $spi_id, "address_type" => "permanentAddress"])->update([
																											"address" => $permanent_address	
																										]);

		// ::::: S_main_contact ::::::::::::::::::::::::::::::::::::::::::::::::::::::

		$mobile_array = explode(",", $mobile_number);

		$deletedRows = Student_phone::where('spi_id', $spi_id)->delete();

		foreach ($mobile_array as $key => $value) {
				
			$phone_numbers = Phone_numbers::firstOrCreate(['phone_number' => trim(preg_replace('/\t+/', '', $value)) ]);
	        $phone_numbers->save();
            $phone_id = $phone_numbers->phone_id;

	        $student_phone = Student_phone::firstOrCreate(['phone_id' => $phone_id, 'spi_id' => $spi_id]);
        	$student_phone->save();
		}

		// ::::: Email_Student :::::::::::::::::::::::::::::::::::::::::::::::::::::::

		$email_array = explode(",", $email_address);

		$emails = Email_student::where('spi_id', $spi_id)->delete();
		foreach ($email_array as $key => $value) {
			
			$new_email = Emails::firstOrCreate(['email' => trim(preg_replace('/\t+/', '', $value)) ]);
			$new_email->save();
			$new_email_id = $new_email->email_id;
			
			$new_email_student = Email_student::firstOrCreate(['email_id' => $new_email_id, "spi_id" => $spi_id]);
			$new_email_student->save();
		}
		
		// ::::: Language :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::

		$language_array = explode(",", $languages);
		
		$language_students = Language_student::where('spi_id', $spi_id)->delete();
		foreach ($language_array as $key => $value) {

			$new_language = Languages::firstOrCreate(['language' => preg_replace('/\t+/', '', $value) ]);
			$new_language->save();
			$new_language_id = $new_language->language_id;

			$new_language_student = Language_student::firstOrCreate(['language_id' => $new_language_id, "spi_id" => $spi_id]);
			$new_language_student->save();
		}





    	return redirect()->route('profile')->with('update_success', 'Update Successful');
    }

    public function add_eligibility(Request $request){

    	$spi_id 		= $request->spi_id;
    	$title 			= $request->title;
		$rank			= $request->rank;
		$rate 			= $request->rate;
		$place_of_exam  = $request->place_of_exam;
		$date_of_exam   = $request->date_of_exam;
		$certificate    = $request->file('eligibility_certificate');

		
		$insert_id = Eligibilities::insertGetId([
												"type"		  	=> $title,
												"rank" 		  	=> $rank,
												"rating" 		=> $rate,
												"place_of_exam" => $place_of_exam,
												"date_of_exam" 	=> $date_of_exam,
												"spi_id"		=> $spi_id
												]);

    	if( $request->hasFile('eligibility_certificate') ){

			if( $certificate->isValid() ){
				$img_extension = $certificate->clientExtension();
				$image_name    = "eligibility_certificate_".$insert_id.".".$img_extension;

				$image = $certificate->storeAs('public/certificates/eligibilities', $image_name);

				$update = Eligibilities::where(["eligibility_id" => $insert_id])->update(["certificate_file" => $image_name]);
			}
    	}

    	return redirect()->route('profile')->with('update_success', 'Update Successful');
    }

    public function remove_eligibility(Request $request){
    	
    	$elig_id = $request->elig_id;
    	$spi_id  = $request->spi_id;

    	$remove_elig = Eligibilities::where(['spi_id' => $spi_id, 'eligibility_id' => $elig_id])->delete();

    	return redirect()->route('profile');

    }

    public function add_certificate(Request $request){
    	
    	$id 		 = $request->input('id');
    	$table  	 = $request->input('table');
    	$column_pk 	 = $request->input('column_pk');

    	$certificate = $request->file('certificate_file');

    	if( $request->hasFile('certificate_file') ){
    		$img_extension = $certificate->clientExtension();
    		$image_name    = $table."_certificate_".$id.".".$img_extension;
    		$image 		   = $certificate->storeAs('public/certificates/'.$table, $image_name);
    		$update 	   = DB::table($table)->where([$column_pk => $id])->update(["certificate_file" => $image_name]);
    	}

    	return redirect()->route('profile')->with('update_success', 'Update Successful');

    }

    public function remove_data(Request $request){

    	$id      = $request->id;
    	$table   = $request->table;
    	$primary = $request->primary;

    	$a = DB::table($table)->where($primary, '=', $id)->delete();
    	return $a;
    }

    public function add_experience(Request $request){
    	$add_exp = Work_experiences::firstOrCreate($request->except('_token'));
    	return redirect()->route('profile')->with('update_success', 'Update Successful');
    }

    public function insert_data(Request $request){

    	// insert the data first to get the ID that will be used as the name of the image file
    	$insert_id = DB::table($request->table)->insertGetId($request->except(['_token', 'table', 'certificate_file', 'p_key']));
    	
    	// check if the request has file with name="certificate_file"
    	if($request->hasFile('certificate_file')){

    		$certificate   = $request->file('certificate_file');

    		$id 		   = $request->id;
    		$table 		   = $request->table;

    		$img_extension = $certificate->clientExtension();
    		$image_name    = $table."_certificate_".$insert_id.".".$img_extension;                   						// insert id is the id of the previous insert
    		$image  	   = $certificate->storeAs('public/certificates/'.$table, $image_name);      						// store in public with a folder named after the table of appropriate data

    		$update  	   = DB::table($request->table)->where([$request->p_key => $insert_id])->update(["certificate_file" => $image_name ]);  	// insert the image name to the data
    	}


    	return redirect()->route('profile')->with('update_success', 'Update Successful');
    }

    public function update_skills(Request $request){
    		
    	$update_skills = Skills::where(['spi_id' => $request->spi_id])->update(["skills" => $request->skills]);
    	return redirect()->route('profile')->with('update_success', 'Update Successful');
    }

}
