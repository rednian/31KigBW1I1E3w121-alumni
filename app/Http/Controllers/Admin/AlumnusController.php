<?php

namespace Alumni\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Alumni\Http\Controllers\Controller;

class AlumnusController extends Controller
{
  public function index()
  {
    return view('admin.alumnus');
  }
}
