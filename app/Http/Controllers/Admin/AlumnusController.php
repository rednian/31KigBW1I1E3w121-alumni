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
//    $data = $this->alumni->select("
//                        SELECT
//                          *
//                        FROM
//                          stud_stat_list
//                        INNER JOIN stud_prog_taken ON stud_prog_taken.stat_id = stud_stat_list.stat_id
//                        INNER JOIN stud_sch_info ON stud_prog_taken.ssi_id = stud_sch_info.ssi_id
//                        ");
//      dd($data);
    return view('admin.account.alumnus');
  }

  public function get_graduate()
  {
    return view('admin.account.alumnus');
  }

}