<?php

namespace Alumni\Http\Controllers\Admin;

use Mail;
use Session;
use Alumni\Company;
use Alumni\Accounts;
use Illuminate\Http\Request;
use Alumni\Mail\CompanyPassword;
use Illuminate\Support\Facades\Hash;
use Alumni\Http\Controllers\Controller;

class CompanyController extends Controller
{


    public function index()
    {

        $companies = Company::paginate(20);
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
            'company_name'=> 'required|min:3|max:255',
            'email'=>'required|email|unique:company_info,email|confirmed',
            'email_confirmation'=>'required|email'
            ]);

        $password = generateRandomString(40);

        $data['password'] = Hash::make($password);
        $data['company_logo'] = 'default/default.png';
        $data['address'] = 'Enter your company address';
         $company =  Company::create($data);

         $account = New Accounts();
         $account->email_address = $data['email'];
         $account->company_id = $company->company_id;
         $account->password = $data['password'];
         $account->save();

         Mail::to($company->email)->send(new CompanyPassword($company, $password));

        return redirect()->back()->with('success', ucwords($request->company_name).' Company successfully created.');
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
