<?php

namespace Alumni\Library;

use Alumni\Children;
use Alumni\Citizenship;
use Alumni\Country;
use Alumni\Department;
use Alumni\Elementary_student;
use Alumni\Program_list;
use Alumni\S_bh_contact;
use Alumni\S_main_address;
use Alumni\SchoolList;
use Alumni\Stud_per_info;
use Alumni\Stud_prog_taken;
use Alumni\Stud_sch_info;
use Alumni\Stud_stat_list;
use Alumni\Stud_type;
use Alumni\StudentEnrollmentStat;
use Alumni\Trans_history;
use Alumni\Volunters;
use Alumni\Year;
use Illuminate\Support\Facades\DB;

class Graduate
{

    protected $alumni;

    public function __construct()
    {
        $this->alumni = DB::connection('sis_main_db');
    }

    public function initialize()
    {
        DB::transaction(function () {

            $this->citizenship();
            $this->stud_per_info();
            $this->program_list();
            $this->stud_sch_info();
            $this->school_list();

            $this->elementary_student();
            $this->student_enrollment_stat();
            $this->year();
            $this->volunter();
            $this->student_bh_contact();
            $this->child();
            $this->stud_type();
            $this->trans_history();
            $this->stud_prog_taken();
            $this->stud_stat_list();
            $this->department();
            $this->country();
        });
    }
    private function elementary_student()
    {
        $students = $this->alumni->select('
                        SELECT
                        elementary_student.*
                        FROM stud_sch_info
                        INNER JOIN stud_per_info ON stud_sch_info.spi_id = stud_per_info.spi_id
                        INNER JOIN stud_prog_taken ON stud_prog_taken.ssi_id = stud_sch_info.ssi_id
                        INNER JOIN stud_stat_list ON stud_prog_taken.stat_id = stud_stat_list.stat_id
                        INNER JOIN elementary_student ON elementary_student.spi_id = stud_per_info.spi_id
                        WHERE stud_stat_list.stat_id = 1
        ');
        foreach ($students as $student){
            $result = Elementary_student::find($student->elementary_id);
            if (empty($result)){
                Elementary_student::create((array)$student);
            }
        }
    }

    private function student_enrollment_stat()
    {
        $student_status = $this->alumni->select('
                        SELECT
                        student_enrollment_stat.ses_id,
                        student_enrollment_stat.ssi_id,
                        student_enrollment_stat.`status`,
                        student_enrollment_stat.sch_year,
                        student_enrollment_stat.semester,
                        student_enrollment_stat.dated,
                        student_enrollment_stat.actions,
                        student_enrollment_stat.created_at,
                        student_enrollment_stat.updated_at
                        FROM
                        stud_sch_info
                        INNER JOIN stud_prog_taken ON stud_prog_taken.ssi_id = stud_sch_info.ssi_id
                        INNER JOIN stud_stat_list ON stud_prog_taken.stat_id = stud_stat_list.stat_id
                        INNER JOIN student_enrollment_stat ON student_enrollment_stat.ssi_id = stud_sch_info.ssi_id
                        WHERE stud_stat_list.stat_id = 1

        ');
        foreach ($student_status as $status){
            $result = StudentEnrollmentStat::find($status->ses_id);
            if (empty($result)){
                StudentEnrollmentStat::create((array)$status);
            }
        }
    }
gi
    private function year()
    {
        $student_year = $this->alumni->select("
                        SELECT
                        `year`.y_id,
                        `year`.sch_year,
                        `year`.`year`,
                        `year`.year_stat,
                        `year`.remarks,
                        `year`.current_stat,
                        `year`.semester,
                        `year`.ssi_id,
                        `year`.created_at,
                        `year`.updated_at
                        FROM
                        stud_sch_info
                        INNER JOIN `year` ON `year`.ssi_id = stud_sch_info.ssi_id
                        INNER JOIN stud_prog_taken ON stud_prog_taken.ssi_id = stud_sch_info.ssi_id
                        INNER JOIN stud_stat_list ON stud_prog_taken.stat_id = stud_stat_list.stat_id
                        WHERE stud_stat_list.stat_id = 1
        ");
        foreach ($student_year as $year){
            $result = Year::find($year->y_id);
            if (empty($result)){
                Year::create((array)$year);
            }
        }
    }

    private function school_list()
    {
        $schools = $this->alumni->select('SELECT * FROM school_lists');
        foreach ($schools as $school){
            $result = SchoolList::find($school->sl_id);
            if (empty($result)){
                SchoolList::create((array)$school);
            }

        }
    }

    //todo verify the student main address table
    private function student_main_address()
    {
        $addresses = $this->alumni->select('
                    SELECT
                    s_main_address.sma_id,
                    s_main_address.spi_id,
                    s_main_address.address,
                    s_main_address.address_type,
                    s_main_address.created_at,
                    s_main_address.updated_at
                    FROM
                    stud_per_info
                    INNER JOIN stud_sch_info ON stud_per_info.spi_id = stud_sch_info.spi_id
                    INNER JOIN stud_prog_taken ON stud_prog_taken.ssi_id = stud_sch_info.ssi_id
                    INNER JOIN stud_stat_list ON stud_prog_taken.stat_id = stud_stat_list.stat_id
                    INNER JOIN s_main_address ON s_main_address.spi_id = stud_per_info.spi_id
                    WHERE stud_stat_list.stat_id = 1

        ');
        foreach ($addresses as $address){
            $result = S_main_address::find($address->sma_id);
            if (empty($result)){
                S_main_address::create((array)$address);
            }
        }
    }

    private function volunter()
    {
        $volunters = $this->alumni->select('
                    SELECT
                    volunters.volunter_id,
                    volunters.spi_id,
                    volunters.organization_name,
                    volunters.position,
                    volunters.no_of_hours,
                    volunters.company,
                    volunters.`from`,
                    volunters.`to`,
                    volunters.created_at,
                    volunters.updated_at
                    FROM
                    stud_per_info
                    INNER JOIN stud_sch_info ON stud_per_info.spi_id = stud_sch_info.spi_id
                    INNER JOIN stud_prog_taken ON stud_prog_taken.ssi_id = stud_sch_info.ssi_id
                    INNER JOIN stud_stat_list ON stud_prog_taken.stat_id = stud_stat_list.stat_id
                    INNER JOIN volunters ON volunters.spi_id = stud_per_info.spi_id
                    WHERE stud_stat_list.stat_id = 1

        ');
        foreach ($volunters as $volunter){
            $result = Volunters::find($volunter->volunter_id);
            if (empty($result)){
                Volunters::create((array)$volunter);
            }
        }
    }

    private function student_bh_contact()
    {
        $sbh_contacts = $this->alumni->select('
                    SELECT
                    s_bh_contact.sbhc_id,
                    s_bh_contact.s_cell,
                    s_bh_contact.s_phone,
                    s_bh_contact.spi_id,
                    s_bh_contact.created_at,
                    s_bh_contact.updated_at
                    FROM stud_per_info
                    INNER JOIN stud_sch_info ON stud_per_info.spi_id = stud_sch_info.spi_id
                    INNER JOIN stud_prog_taken ON stud_prog_taken.ssi_id = stud_sch_info.ssi_id
                    INNER JOIN stud_stat_list ON stud_prog_taken.stat_id = stud_stat_list.stat_id
                    INNER JOIN s_bh_contact ON s_bh_contact.spi_id = stud_per_info.spi_id
                    WHERE stud_stat_list.stat_id = 1

        ');
        foreach ($sbh_contacts as $sbh_contact){
            $result = S_bh_contact::find($sbh_contact->shbc_id);
            if (empty($result)){
                S_bh_contact::create((array)$sbh_contact);
            }
        }
    }

    private function child()
    {
        $children = $this->alumni->select('
                       SELECT
                        childrens.children_id,
                        childrens.full_name,
                        childrens.name_of_school,
                        childrens.date_of_birth,
                        childrens.gender,
                        childrens.spi_id,
                        childrens.created_at,
                        childrens.updated_at
                      FROM stud_per_info
                      INNER JOIN stud_sch_info ON stud_per_info.spi_id = stud_sch_info.spi_id
                      INNER JOIN stud_prog_taken ON stud_prog_taken.ssi_id = stud_sch_info.ssi_id
                      INNER JOIN stud_stat_list ON stud_prog_taken.stat_id = stud_stat_list.stat_id
                      INNER JOIN childrens ON childrens.spi_id = stud_per_info.spi_id
                      WHERE stud_stat_list.stat_id = 1
        ');
        foreach ($children as $child){
            $result =Children::find($child->children_id);
            if (empty($result)){
                Children::create((array)$children);
            }
        }
    }

    private function stud_per_info()
    {
        $students = $this->alumni->select('
                        SELECT
                            stud_per_info.spi_id,
                            stud_per_info.cit_id,
                            stud_per_info.fname,
                            stud_per_info.mname,
                            stud_per_info.lname,
                            stud_per_info.suffix,
                            stud_per_info.birthdate,
                            stud_per_info.birthplace,
                            stud_per_info.gender,
                            stud_per_info.civ_status,
                            stud_per_info.weight,
                            stud_per_info.height,
                            stud_per_info.blood_type,
                            stud_per_info.religion,
                            stud_per_info.created_at,
                            stud_per_info.updated_at
                        FROM stud_per_info 
                        INNER JOIN stud_sch_info ON stud_per_info.spi_id = stud_sch_info.spi_id
                        INNER JOIN stud_prog_taken ON stud_prog_taken.ssi_id = stud_sch_info.ssi_id
                        INNER JOIN stud_stat_list ON stud_prog_taken.stat_id = stud_stat_list.stat_id
                        WHERE stud_stat_list.stat_id = 1
        ');
        foreach ($students as $student){
            $result = Stud_per_info::find($student->spi_id);
            if (empty($result)){
                Stud_per_info::create((array)$student);
            }
        }

    }

    private function stud_sch_info()
    {
        $students = $this->alumni->select('
                      SELECT
                        stud_sch_info.ssi_id,
                        stud_sch_info.stud_id,
                        stud_sch_info.acct_no,
                        stud_sch_info.usn_no,
                        stud_sch_info.dep_ed_id,
                        stud_sch_info.spi_id,
                        stud_sch_info.st_id,
                        stud_sch_info.created_at,
                        stud_sch_info.updated_at
                      FROM stud_sch_info
                      INNER JOIN stud_prog_taken ON stud_sch_info.ssi_id = stud_prog_taken.ssi_id
                      INNER JOIN stud_stat_list ON stud_prog_taken.stat_id = stud_stat_list.stat_id
                      WHERE stud_stat_list.stat_id = 1
                        ');
        foreach ($students as $student) {
            $result = Stud_sch_info::find($student->ssi_id);
            if (empty($result)) {
                Stud_sch_info::create((array)$student);
            }
        }
    }

    private function stud_type()
    {
        $types = $this->alumni->select('SELECT * FROM stud_type');
        foreach ($types as $type){
            $result = Stud_type::find($type->st_id);
            if (empty($result)){
                Stud_type::create((array)$type);
            }
        }
    }

    private function trans_history()
    {
        $trasactions = $this->alumni->select('
                            SELECT
                            trans_history.th_id,
                            trans_history.date,
                            trans_history.time,
                            trans_history.responsible,
                            trans_history.registered_ip,
                            trans_history.trans_type,
                            trans_history.pl_id,
                            trans_history.created_at,
                            trans_history.updated_at
                            FROM program_list
                            INNER JOIN stud_prog_taken ON stud_prog_taken.pl_id = program_list.pl_id
                            INNER JOIN stud_stat_list ON stud_prog_taken.stat_id = stud_stat_list.stat_id
                            INNER JOIN trans_history ON trans_history.pl_id = program_list.pl_id
                            WHERE stud_prog_taken.stat_id = 1
');
        foreach ($trasactions as $trasaction) {
            $result = Trans_history::find($trasaction->th_id);
            if (empty($result)) {
                Trans_history::create((array)$trasaction);
            }
        }
    }

    private function stud_prog_taken()
    {
        $programs = $this->alumni->select('SELECT * FROM stud_prog_taken WHERE stat_id = 1');
        foreach ($programs as $program) {
            $result = Stud_prog_taken::find($program->spth_id);
            if (empty($result)) {
                Stud_prog_taken::create((array)$program);
            }
        }
    }

    private function program_list()
    {
        $programs = $this->alumni->select('
                    SELECT
                        program_list.pl_id,
                        program_list.prog_code,
                        program_list.prog_abv,
                        program_list.prog_name,
                        program_list.prog_desc,
                        program_list.prog_type,
                        program_list.`level`,
                        program_list.major,
                        program_list.senior_high_track,
                        program_list.dep_id,
                        program_list.created_at,
                        program_list.updated_at
                    FROM program_list
                    INNER JOIN stud_prog_taken ON stud_prog_taken.pl_id = program_list.pl_id
                    INNER JOIN stud_stat_list ON stud_prog_taken.stat_id = stud_stat_list.stat_id
                    WHERE stud_prog_taken.stat_id = 1
        ');
        foreach ($programs as $program) {
            $result = Program_list::find($program->pl_id);
            if (empty($result)) {
                Program_list::create((array)$program);
            }
        }
    }

    private function stud_stat_list()
    {
        $stats = $this->alumni->select('SELECT * FROM stud_stat_list');
        foreach ($stats as $stat) {
            $result = Stud_stat_list::find($stat->stat_id);
            if (empty($result)) {
                Stud_stat_list::create((array)$stat);
            }
        }
    }

    private function department()
    {
        $departments = $this->alumni->select('SELECT * FROM department');
        foreach ($departments as $department) {
            $result = Department::find($department->dep_id);
            if (empty($result)) {
                Department::create((array)$department);
            }
        }
    }

    private function country()
    {
        $countries = $this->alumni->select("SELECT * FROM country");
        foreach ($countries as $country) {
            $result = Country::find($country->country_id);
            if (empty($result)) {
                Country::create((array)$country);
            }
        }
    }

    private function citizenship()
    {
        $citizenships = $this->alumni->select('SELECT * FROM citizenship');
        foreach ($citizenships as $citizenship){
            $result = Citizenship::find($citizenship->cit_id);
            if (empty($result)){
                Citizenship::create((array)$citizenship);
            }
        }
    }
}