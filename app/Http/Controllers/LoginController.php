<?php

namespace Alumni\Http\Controllers;

use Alumni\Model\AlumniModel;
use Illuminate\Http\Request;


class LoginController extends Controller
{
    
	public function loginValidation(Request $request){
		
		$AlumniModel = new AlumniModel;

		$username = $request->input('username');

		$validatedData = $request->validate([

					        'username'  => 'required|max:255',
					        'password'  => 'required',

					    ]);

		return $validatedData;

	}	

	// public function getIdInfo(Request $request){

	// 	$AlumniModel = new AlumniModel;

	// 	$username    = $request->input('username');

	// 	$info = $AlumniModel->getIdInfo($username);

	// 	return $info;
	// }	



}
