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
    if(Auth::guard('admin')->attempt(['username'=>$request->username,'password'=>$request->password])){

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
