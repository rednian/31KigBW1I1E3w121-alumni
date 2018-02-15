<?php

namespace Alumni\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Alumni\Http\Requests\Account;
use Alumni\Http\Controllers\Controller;
use Alumni\Model\AdminModel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Session;


class AccountController extends Controller
{

    public function __construct()
    {


    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $users = AdminModel::paginate(6);

        return view('admin.account.account',compact('users'));
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
        if($request->hasFile('image')){

            $date = Carbon::now();
            $image = $request->file('image');
            $image_extension = $image->clientExtension();

            if($image->isValid()){

                //rename the image file to username and date uploaded
                $image_name = $request['username'].'_'.$date->format('m-d-Y').'.'.$image_extension;

                $image = $request->image->storeAs('admin',$image_name);

                $request['image_path'] = $image;
            }

        }
        else{
            $request['image_path']= 'default/user.png';
        }

        $request['password'] = Hash::make($request->password);

        AdminModel::create($request->all());

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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $user =  AdminModel::find($id);


//        return $user->delete() ? true: false;

    }


    public function get_status(Request $request){


//        return ($request->input('status'));

//        return response()->json([
//          'name' => 'Abigail',
//          'state' => 'CA'
//        ]);
    }
}
