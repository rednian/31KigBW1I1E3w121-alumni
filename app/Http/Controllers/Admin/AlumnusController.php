<?php

namespace Alumni\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Alumni\Http\Controllers\Controller;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use Alumni\Library\Graduate;
use Alumni\Country;

class AlumnusController extends Controller {

  protected $alumni;

  public function __construct() {
    $this->alumni = DB::connection('sis_main_db');
  }

  public function index() {
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

  public function get_graduate() {

  $graduate = new Graduate();

  dd($graduate->country());



//    print_r($graduate);
//    Country::firstOrCreate($graduate);

//    dd($graduate->country());

//    $data = $this->alumni->select("
//      SELECT
//      curriculum_06_07_2017.`subject`.subj_id,
//curriculum_06_07_2017.`subject`.subj_code,
//curriculum_06_07_2017.`subject`.subj_name,
//curriculum_06_07_2017.`subject`.subj_desc,
//curriculum_06_07_2017.`subject`.lec_hour,
//curriculum_06_07_2017.`subject`.lec_unit,
//curriculum_06_07_2017.`subject`.lab_hour,
//curriculum_06_07_2017.`subject`.lab_unit,
//curriculum_06_07_2017.`subject`.split,
//curriculum_06_07_2017.`subject`.subj_type,
//sis_main_db.parents.parent_id,
//sis_main_db.parents.fname,
//sis_main_db.parents.mname,
//sis_main_db.parents.lname,
//sis_main_db.parents.suffix,
//sis_main_db.parents.occupation,
//sis_main_db.parents.office_address,
//sis_main_db.parents.deceased,
//sis_main_db.parents.birthdate,
//sis_main_db.parents.created_at,
//sis_main_db.parents.updated_at,
//sis_main_db.s_main_address.sma_id,
//sis_main_db.s_main_address.spi_id,
//sis_main_db.s_main_address.add_id,
//sis_main_db.s_main_address.address_type,
//sis_main_db.s_main_address.use_present_address,
//sis_main_db.s_main_address.created_at,
//sis_main_db.s_main_address.updated_at
//FROM
//sis_main_db.stud_per_info
//INNER JOIN sis_main_db.stud_sch_info ON sis_main_db.stud_sch_info.spi_id = sis_main_db.stud_per_info.spi_id
//INNER JOIN sis_main_db.stud_prog_taken ON sis_main_db.stud_prog_taken.ssi_id = sis_main_db.stud_sch_info.ssi_id
//INNER JOIN sis_main_db.stud_stat_list ON sis_main_db.stud_prog_taken.stat_id = sis_main_db.stud_stat_list.stat_id
//INNER JOIN sis_main_db.subject_enrolled ON sis_main_db.subject_enrolled.ssi_id = sis_main_db.stud_sch_info.ssi_id
//INNER JOIN curriculum_06_07_2017.sched_subj ON sis_main_db.subject_enrolled.ss_id = curriculum_06_07_2017.sched_subj.ss_id
//INNER JOIN curriculum_06_07_2017.subj_sched_day ON curriculum_06_07_2017.subj_sched_day.ss_id = curriculum_06_07_2017.sched_subj.ss_id
//INNER JOIN curriculum_06_07_2017.sched_day ON curriculum_06_07_2017.sched_day.sd_id = curriculum_06_07_2017.subj_sched_day.sd_id
//INNER JOIN curriculum_06_07_2017.room_list ON curriculum_06_07_2017.room_list.rl_id = curriculum_06_07_2017.subj_sched_day.rl_id
//INNER JOIN curriculum_06_07_2017.block_section ON curriculum_06_07_2017.block_section.bs_id = curriculum_06_07_2017.sched_subj.bs_id
//INNER JOIN sis_main_db.curr_used ON sis_main_db.curr_used.ssi_id = sis_main_db.stud_sch_info.ssi_id
//INNER JOIN sis_main_db.gen_ave ON sis_main_db.gen_ave.cu_id = sis_main_db.curr_used.cu_id
//INNER JOIN curriculum_06_07_2017.cur_subject ON sis_main_db.gen_ave.cs_id = curriculum_06_07_2017.cur_subject.cs_id
//INNER JOIN curriculum_06_07_2017.`subject` ON curriculum_06_07_2017.`subject`.subj_id = curriculum_06_07_2017.cur_subject.subj_id
//INNER JOIN sis_main_db.parents_student ON sis_main_db.parents_student.spi_id = sis_main_db.stud_per_info.spi_id
//INNER JOIN sis_main_db.parents ON sis_main_db.parents_student.parent_id = sis_main_db.parents.parent_id
//INNER JOIN sis_main_db.s_main_address ON sis_main_db.s_main_address.spi_id = sis_main_db.stud_per_info.spi_id
//WHERE
//sis_main_db.stud_prog_taken.stat_id = 1
//
//                        ");
//    dd($data);
    return view('admin.account.alumnus');
  }

}