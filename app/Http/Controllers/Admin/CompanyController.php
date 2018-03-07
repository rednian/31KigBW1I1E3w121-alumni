<?php

namespace Alumni\Http\Controllers\Admin;

use Mail;
use Session;
use Alumni\Company;
use Alumni\Accounts;
use Alumni\Mail\SendEmail;
use Illuminate\Http\Request;
use Alumni\Http\Controllers\Controller;

class CompanyController extends Controller
{


    public function index()
    {
        $companies = Company::all();

        return view('admin.company',compact('companies'));
    }

    public function visitor()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->validate([
            'company_name'=> 'required',
            'email'=>'required|email'
            ]);



         $company =  Company::create($data);

         // Mail::to($request->email)->send(new SendEmail($data));

        Mail::send('layouts.admin.email',['$company'=>'$company_name'], function($message){

            // $m->from('rednianrsadsaded@gmail.com', 'Your Application');

            $message->to('rednianred@gmail.com', '$user->name')->subject('Your Reminder!');

        });

        Session::flash('success', ucwords($request->company_name).' Company successfully created.');

        return redirect()->back();  
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
