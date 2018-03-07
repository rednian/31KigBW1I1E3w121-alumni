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


		if(Auth::check()){
			$user 	= Accounts::user_info();
			$posts = $this->posts();
			return view('/alumnus/index', compact('user', 'posts'));
		}
		else{
			return view('login');
		}
	
	}

	public function posts(){

		$posts = Posts::with(

								'company', 
								'positions',
								'comments', 
								'comments.company_info', 
								'comments.alumnus_info.student_per_info.stud_image', 
								'comments.alumnus_info.stud_program.program_list',
								'comments.replies.company_info',
								'comments.replies.alumnus_info.student_per_info'

							)->get();
		
		// foreach ($posts->toArray() as $key => $value) {
		// 	echo "<pre>";
		// 	print_r($value['post_content']);
		// }

		// dd($posts);
		return $posts;

	}

	public function post_comment(Request $request){

		

		$id      = "";
		$id_type = "";

		if( Auth::user()->ssi_id ){
			$id      = Auth::user()->ssi_id;
			$id_type = "ssi_id";
		}else{
			$id      = Auth::user()->company_id;
			$id_type = "company_id";
		}

		DB::table('comments')->insert(
		    [
		    	'post_id' => $request->input('data')['post_id'], 
		    	'date'    => DB::raw('now()'), 
		    	'content' => $request->input('data')['comment_content'],
		    	$id_type  => $id
		    ]
		);

		$lastId = DB::getPdo()->lastInsertId();;
		$data   = Comments::find($lastId);
		
		return Comments::find($lastId);

	}

	public function post_reply(Request $request){
		dd($request->input());
	}

}
