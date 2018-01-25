<?php

namespace Alumni\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;

use Alumni\Accounts;
use Alumni\User;
use Alumni\Graduates;



class Account extends Controller
{

	public function index(){

		return view('login');
	}

	// public function home(){


	// 	$user = Accounts::find(3)->load('alumnus_info.student_per_info');
		
	// 	return view('/alumnus/index', compact('user'));
	// }

	public function logIn(Request $request){


		$username = $request->post('username');
    	$password = $request->post('password');

    	// Validate form

    	$validatedData = $request->validate([
	        'username'  => 'required',
	        'password'  => 'required',
	    ]);

    	
    	
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



}