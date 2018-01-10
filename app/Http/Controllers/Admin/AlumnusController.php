<?php

namespace Alumni\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Alumni\Http\Controllers\Controller;
use Illuminate\Support\Facades\URL;

class AlumnusController extends Controller {

  public function index()
  {

    return view('admin.alumnus');
  }

}