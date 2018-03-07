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


class AccountController extends Controller {

  public function __construct() {

  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index() {
    $users = AdminModel::paginate(6);

    return view('admin.account.account', compact('users'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create() {

  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request) {
    $account = $request->validate(
      [
        'fname' => 'required|alpha_spaces|min:3|max:255',
        'midname' => 'nullable|alpha_spaces|min:3|max:255',
        'lastname' => 'required|alpha_spaces|min:3|max:255',
        'department' => 'required|alpha_spaces|min:3|max:255',
        'position' => 'required|alpha_spaces|min:3|max:255',
        'password' => 'required|different:username|min:6|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\X]).+$/|confirmed',
        'password_confirmation' => 'required',
        'image_path' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        'username' => 'required|unique:admin,username|min:5|max:255',
      ]
    );

    if ($request->hasFile('image')) {

      $date = Carbon::now();
      $image = $request->file('image');
      $image_extension = $image->clientExtension();

      if ($image->isValid()) {

        //rename the image file to username and date uploaded
        $image_name = $request['username'] . '_' . $date->format('m-d-Y') . '.' . $image_extension;
        $image_location = 'public/admin';

        $request->image->storeAs($image_location, $image_name);

        $account['image_path'] = '/admin/' . $image_name;
      }

    } else {
      $account['image_path'] = 'default/user.png';
    }

    $account['password'] = Hash::make($request->password);

    AdminModel::create($account);

    return back()->with('success', 'Account successfully created.');
  }

  /**
   * Display the specified resource.
   *
   * @param  int $id
   * @return \Illuminate\Http\Response
   */
  public function show($id) {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id) {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request $request
   * @param  int $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id) {

  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id) {
//       $user =  AdminModel::find($id);
//       $user->status = $request->status;
//       $user->save();


//        return $user->delete() ? true: false;

  }



  public function get_status(Request $request) {

    $admin = AdminModel::find($request->user_id);
    $admin->status = $request->status;
    $admin->save();

    return response()->json($admin->only(['fname', 'lastname']));
    // return redirect()->back()->with('success','dfsdsfsd');
  }
}
