<?php

namespace Alumni\Http\Controllers\admin\Auth;

use Illuminate\Http\Request;
use Auth;
use Alumni\Http\Controllers\Controller;

class AdminLoginController extends Controller
{
  public function __construct()
  {
    $this->middleware('guest:admin',['except'=>'logout']);
  }


  public function show_form()
  {
    return view('admin.auth.admin-login');
  }


  public function login(Request $request)
  {
    $credentials = $request->validate([
      'username'=>'required',
      'password'=>'required'
    ]);

    if(Auth::guard('admin')->attempt(['username'=>$request->username,'password'=>$request->password, 'status'=>1])){

      return redirect()->intended(route('account.index'));

    }

    return redirect()->back()->withInput($request->only('username'));
  }

  public function logout()
  {
      Auth::guard('admin')->logout();

      return redirect()->route('admin.login');
  }

}
