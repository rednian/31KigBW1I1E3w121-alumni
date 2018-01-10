<?php

namespace Alumni\Http\Controllers;

use App\Model\AlumniModel;
use Illuminate\Http\Request;


class LoginController extends Controller
{
    
	public function loginValidation(AlumniModel $am){
		
		dd($am);
		

	}	

}
