<?php

namespace Alumni\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Alumni\Http\Controllers\Controller;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;

class AlumnusController extends Controller {

  protected $alumni;

  public function __construct()
  {
    $this->alumni = DB::connection('sis_main_db');
  }

  public function index()
  {
    $data = $this->alumni->select('select * from stud_per_info');
      dd($data);
    return view('admin.alumnus');
  }

}