<?php

namespace Alumni\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Alumni\Http\Requests\Account;
use Alumni\Http\Controllers\Controller;
use Alumni\Model\AdminModel;
use Session;


class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $admin_user = AdminModel::all()->sortBy('user_id');

//        dd(storage_path());

        return view('admin.account',compact('admin_user'));
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
    public function store(Account $request)
    {

        $request['password'] = Hash::make($request->password);
        $image_name = $request['username'].Carbon::now();

        dd($image_name);


        if($request->hasFile('image_path')){

            $image = $request->image_path->storeAs('admin',$request['username']);

//            dd($image);


        }
        else{
//            $request['image_path']= '';
        }

//        AdminModel::create($request->all());

        Session::flash('success','Account successfully created.');
        return back();
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
