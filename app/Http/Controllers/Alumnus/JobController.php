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
use Alumni\Posts;
use Alumni\Position_attachments;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd($request->input());
        if(Auth::check()){
            $user            = Accounts::user_info();
            $graduation_info = Graduates::grad_alumnus_info(Auth::user()->ssi_id);
            $all_jobs        = Posts::with('company', 'positions')->where(['post_type' => 'job_post'])->orderBy('post_date', 'desc')->paginate(1, ['*'], 'all_page');
            $domestic        = Posts::with('company', 'positions')->where(['post_type' => 'job_post', "location_type" => "domestic"])->orderBy('post_date', 'desc')->paginate(10, ['*'], 'dom_page');
            $international   = Posts::with('company', 'positions')->where(['post_type' => 'job_post', "location_type" => "international"])->orderBy('post_date', 'desc')->paginate(10, ['*'], 'int_page');
            $recommended     = Position_attachments::recommendedJobs($user);
            $searched_job    = "";

            return view('alumnus/job', compact('user', 'graduation_info', 'all_jobs', 'domestic', 'international', 'recommended','searched_job'));
        }
        else{
            return redirect()->route('login');
        }
    }



    public function job_search(Request $request){
        if(Auth::check()){
            $user            = Accounts::user_info();
            $graduation_info = Graduates::grad_alumnus_info(Auth::user()->ssi_id);
            $searched_job    = Posts::with('company')->where([
                                                                ['post_type', '=', 'job_post'],
                                                                ['position' , 'like' , '%'.$request->search_key.'%']
                                                            ])
                                                            // ->whereHas('company', function($query)use ($request){     
                                                            //                 $query->orWhere([
                                                            //                                     ['company_name', 'like' , '%'.$request->search_key.'%'],
                                                            //                                     ['position' , 'like' , '%'.$request->search_key.'%']
                                                            //                                 ])
                                                            //                       ->where('post_type', '=', 'job_post');
                                                            //          })
                                                            ->orderBy('post_date', 'desc')
                                                            ->paginate(10, ['*'], 'all_page');
            // dd($searched_job);
            return view('alumnus/job', compact('user', 'graduation_info', 'searched_job'));
        }
        else{
            return redirect()->route('login');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
