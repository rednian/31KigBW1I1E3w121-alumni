<?php

namespace Alumni\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;

use Alumni\Accounts;
use Alumni\User;
use Alumni\Graduates;
use Alumni\Stud_sch_info;
use Alumni\Stud_image;



class Account extends Controller
{

	public function index(){

		if(Auth::check()){
			return redirect()->route('home');
		}
		else{
			return view('login');
		}
	}

	// public function home(){


	// 	$user = Accounts::find(3)->load('alumnus_info.student_per_info');
		
	// 	return view('/alumnus/index', compact('user'));
	// }

	public function myAccount(){
		
		if(Auth::check()){
	    	$user 			 = Accounts::user_info();
	    	$graduation_info = Graduates::grad_alumnus_info(Auth::user()->ssi_id);
     		return view('alumnus/account', compact('user', 'graduation_info'));
    	}
    	else{
			return redirect()->route('login');
    	}
	}

	public function logIn(Request $request){


		$username = $request->post('username');
    	$password = $request->post('password');

    	// Validate form

    	$validatedData = $request->validate([
	        'username'  => 'required',
	        'password'  => 'required',
	    ]);

    	try {
		    // DB::connection()->getPdo();

	   		 // Check if registered
	    	if(Auth::attempt(["username" => $username, "password" => $password])){
	    		return redirect()->route('home');
	    	}

	    	else{

	    		$register = $this->registerAlumnus($request);

	    		if($register){

					Auth::login($alumni_info);
	    			return redirect()->route('home');
	    		}
	    		else{
	    			return back()->withInput()->with('invalidAccount', 'Invalid username/password.');
	    		}
	    	}

		} catch (\Exception $e) {
		    die("Could not connect to the database.  Please check your configuration.");
		}
	}

	public function registerAlumnus($request){

		//check if ID is registered

		// $user = DB::table('stud_sch_info')
		// 			->select('stud_sch_info.ssi_id', 'stud_sch_info.stud_id', 'stud_per_info.fname', 'stud_per_info.mname', 'stud_per_info.lname')
		// 			->join('stud_per_info', 'stud_per_info.spi_id', '=', 'stud_sch_info.spi_id')
		// 			->where('stud_sch_info.stud_id', '=', $request->post('username'))
		// 			->where('stud_sch_info.stud_id', '=', $request->post('password'))
		// 			->first();

		$user = Graduates::new_alumnus($request->post('username'), $request->post('password'));

		return $user;

		if( $user ){
			

			$ssi_id = $user->ssi_id;

			$register_user = User::create([

				'account_type' => 'alumnus',
				'username'	   => $request->post('username'),
				'password'	   => bcrypt( $request->post('password') ),
				'ssi_id'	   => $ssi_id,
				'status'	   => 'default'

			]);

			return $register_user;
			

		}
		// if not an alumni
		else{
			return null;
		}
	}

	public function logout(){

		Auth::logout();
		return redirect()->route('login');
	}

	public function get_image(){

		$ssi_id = Auth::user()->ssi_id;

		$spi_id = Stud_sch_info::find($ssi_id)->spi_id;

		$get_image = Stud_image::where(['spi_id' => $spi_id])->first();

		return response()->json($get_image);
	}

	public function update_username(Request $request){

		if (Hash::check($request->old_password, Auth::user()->password)){

			$update = Accounts::where('account_id', Auth::user()->account_id)->update(['username' => $request->username]);

			if($update){
				return redirect()->back()->with('update_success', 'Username successfuly updated');
			}

		}
		else{

			return redirect()->back()->with('username_wrong_password', 'Wrong password');

		}
	}

	public function update_password(Request $request){
		
		if (Hash::check($request->old_password, Auth::user()->password)){

			$update = Accounts::where('account_id', Auth::user()->account_id)->update(['password' => bcrypt($request->password_confirmation) ]);

			if($update){
				return redirect()->back()->with('update_success', 'Password successfuly updated');
			}

		}
		else{
			return redirect()->back()->with('password_wrong_password', 'Wrong password');
		}
	}

	public function update_contact(Request $request){
		if (Hash::check($request->old_password, Auth::user()->password)){
			$update = Accounts::where('account_id', Auth::user()->account_id)->update(['contact_verification_no' => $request->new_number ]);

			if($update){
				return redirect()->back()->with('update_success', 'Contact number successfuly updated');
			}
		}
		else{
			return redirect()->back()->with('contact_wrong_password', 'Wrong password');
		}
	}

	public function update_email(Request $request){
		if (Hash::check($request->old_password, Auth::user()->password)){
			$update = Accounts::where('account_id', Auth::user()->account_id)->update(['email_address' => $request->new_email ]);

			if($update){
				return redirect()->back()->with('update_success', 'Email successfuly updated');
			}
		}
		else{
			return redirect()->back()->with('email_wrong_password', 'Wrong password');
		}
	}


}