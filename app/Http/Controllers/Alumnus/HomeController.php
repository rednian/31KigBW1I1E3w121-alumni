<?php

namespace Alumni\Http\Controllers\Alumnus;

use Illuminate\Http\Request;
use Alumni\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Alumni\Accounts;
use Alumni\Posts;
use Alumni\Comments;

class HomeController extends Controller
{
 	
	
	public function index(){


		$acc_id = Auth::user()->account_id;

		$user 	=	Accounts::find($acc_id)->with('alumnus_info.student_per_info', 'alumnus_info.stud_program.program_list')
											->whereHas('alumnus_info.stud_program', function($query) {     
						                        $query->where('sch_year', '2017-2018')
							                    	  ->where('semester', '2nd')
							                    	  ->orderBy('semester', 'asc');
						                    })->first();

		$posts = $this->posts();
		return view('/alumnus/index', compact('user', 'posts'));
	
	}

	public function posts(){

		$posts = Posts::with('company', 'comments', 'comments.company_comments', 'comments.alumnus_comments')->get();

		return $posts;

	}

}
