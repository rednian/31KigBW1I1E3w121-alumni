<?php

namespace Alumni\Http\Controllers\admin\Auth;

use Illuminate\Http\Request;
use Alumni\Http\Controllers\Controller;

class AdminLoginController extends Controller
{
  public function show_form()
  {
    return view('admin.auth.admin-login');
  }

  public function login()
  {
    return true;
  }
}
