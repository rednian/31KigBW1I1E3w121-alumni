<?php

namespace Alumni\Library;

use Alumni\Address;
use Alumni\Barangay;
use Alumni\Children;
use Alumni\Citizenship;
use Alumni\City;
use Alumni\Country;
use Alumni\CurriculumUsed;
use Alumni\Department;
use Alumni\Elementary_student;
use Alumni\Hschool_Student;
use Alumni\Program_list;
use Alumni\Province;
use Alumni\Region;
use Alumni\S_bh_contact;
use Alumni\S_main_address;
use Alumni\Scholarship;
use Alumni\ScholarshipList;
use Alumni\SchoolList;
use Alumni\ShiftHistory;
use Alumni\Stud_per_info;
use Alumni\Stud_prog_taken;
use Alumni\Stud_sch_info;
use Alumni\Stud_stat_list;
use Alumni\Stud_type;
use Alumni\StudentEnrollmentStat;
use Alumni\StudentGrade;
use Alumni\StudentSubjectLogs;
use Alumni\StudProgram;
use Alumni\SubjectEnrolled;
use Alumni\SubjectEnrolledStatus;
use Alumni\Trans_history;
use Alumni\UncreditedSubjectGrades;
use Alumni\UncreditedSubjects;
use Alumni\UsageStatus;
use Alumni\VocationalRecord;
use Alumni\Volunters;
use Alumni\Year;
use Illuminate\Support\Facades\DB;

class Graduate
{

    private $sis_database;
    private $curriculum;

    public function __construct()
    {
        $this->sis_database = DB::connection('sis_main_db');
        $this->curriculum = DB::connection('curriculum');
    }

    public function initialize()
    {
        DB::transaction(function () {

            $this->citizenship();
            $this->studentInfo();
            $this->programList();
            $this->studentSchoolInfo();
            $this->schoolList();
            $this->schoolarshipList();
            $this->subjectEnrolledStatus();

            //address
            $this->country();
            $this->region();
            $this->province();
            $this->city();
            $this->barangay();
            $this->address();

            //dependent table should put under this line
            $this->highSchoolRecord();
            $this->vocationalRecord();
            $this->studentCurriculumUsed();
            $this->usageStatus();
            $this->studentProgram();
            $this->shiftHistory();
            $this->scholarship();
            $this->elementaryStudent();
            $this->studentEnrollmentStatus();
            $this->studentSubjectEnrolled();
            $this->studentGrade();
            $this->studentSubjectLogs();
            $this->year();
            $this->volunter();
            $this->studentBhContact();
            $this->child();
            $this->studentType();
            $this->transactionHistory();
            $this->studentProgramTaken();
            $this->studentStatusList();
            $this->department();
            $this->uncreditedSubjects();
            $this->uncreditedSubjectsGrade();
        });
    }
    private function uncreditedSubjectsGrade()
    {
        $grades = $this->query('
                    SELECT
                    uncredited_subject_grades.*
                    FROM
                    stud_sch_info
                    INNER JOIN stud_prog_taken ON stud_prog_taken.ssi_id = stud_sch_info.ssi_id
                    INNER JOIN stud_stat_list ON stud_prog_taken.stat_id = stud_stat_list.stat_id
                    INNER JOIN uncredited_subjects ON uncredited_subjects.ssi_id = stud_sch_info.ssi_id
                    INNER JOIN uncredited_subject_grades ON uncredited_subject_grades.ucs_id = uncredited_subjects.ucs_id
                    WHERE stud_stat_list.stat_id = 1
                ');
        foreach ($grades as $grade){
            $result = UncreditedSubjectGrades::find();
            if (empty($result)){
                UncreditedSubjectGrades::create((array)$grade);
            }
        }
    }

    private function uncreditedSubjects()
    {
        $subjects = $this->query('
                SELECT
                uncredited_subjects.*
                FROM
                stud_sch_info
                INNER JOIN stud_prog_taken ON stud_prog_taken.ssi_id = stud_sch_info.ssi_id
                INNER JOIN stud_stat_list ON stud_prog_taken.stat_id = stud_stat_list.stat_id
                INNER JOIN stud_per_info ON stud_sch_info.spi_id = stud_per_info.spi_id
                INNER JOIN hschool_student ON hschool_student.spi_id = stud_per_info.spi_id
                INNER JOIN uncredited_subjects ON uncredited_subjects.ssi_id = stud_sch_info.ssi_id AND uncredited_subjects.hss_id = hschool_student.hss_id
                WHERE stud_stat_list.stat_id = 1
                ');
        foreach ($subjects as $subject){
            $result = UncreditedSubjects::find($subject->ucs_id);
            if (empty($result)){
                UncreditedSubjects::create((array)$subject);
            }
        }
    }

    private function highSchoolRecord()
    {
        $records = $this->query('
            SELECT
            hschool_student.*
            FROM
            stud_sch_info
            INNER JOIN stud_prog_taken ON stud_prog_taken.ssi_id = stud_sch_info.ssi_id
            INNER JOIN stud_stat_list ON stud_prog_taken.stat_id = stud_stat_list.stat_id
            INNER JOIN stud_per_info ON stud_sch_info.spi_id = stud_per_info.spi_id
            INNER JOIN hschool_student ON hschool_student.spi_id = stud_per_info.spi_id
            WHERE stud_stat_list.stat_id = 1
        ');
        foreach ($records as $record){
            $result = Hschool_Student::find($record->hss_id);
            if (empty($result)){
                Hschool_Student::create((array)$record);
            }
        }
    }

    private function vocationalRecord()
    {
        $records = $this->query('
                SELECT
                vocational_record.*
                FROM
                stud_sch_info
                INNER JOIN stud_prog_taken ON stud_prog_taken.ssi_id = stud_sch_info.ssi_id
                INNER JOIN stud_stat_list ON stud_prog_taken.stat_id = stud_stat_list.stat_id
                INNER JOIN stud_per_info ON stud_sch_info.spi_id = stud_per_info.spi_id
                INNER JOIN vocational_record ON vocational_record.spi_id = stud_per_info.spi_id
                WHERE stud_stat_list.stat_id = 1
        ');
        foreach ($records as $record){
            $result = VocationalRecord::find($record->vr_id);
            if (empty($result)){
                VocationalRecord::create((array)$record);
            }
        }
    }

    private function address()
    {
        $addresses = $this->query('
                SELECT
                address.*
                FROM
                address
                INNER JOIN brgy ON address.brgy_id = brgy.brgy_id
                INNER JOIN city ON address.city_id = city.city_id AND brgy.city_id = city.city_id
                INNER JOIN prov ON address.province_id = prov.province_id AND city.province_id = prov.province_id
                INNER JOIN regions ON address.reg_id = regions.reg_id AND prov.reg_id = regions.reg_id
                INNER JOIN country ON address.country_id = country.country_id AND regions.country_id = country.country_id
        ');
//        dd($addresses);
        foreach ($addresses as $address){
            $result = Address::find($address->add_id);
            if (empty($result)){
                Address::create((array)$address);
            }
        }
    }

    private function barangay()
    {
        $barangays = $this->query('
                    SELECT
                    brgy.*
                    FROM
                    brgy
                    INNER JOIN city ON brgy.city_id = city.city_id
                    INNER JOIN prov ON city.province_id = prov.province_id
                    INNER JOIN regions ON prov.reg_id = regions.reg_id
                    INNER JOIN country ON regions.country_id = country.country_id
         ');
        foreach ($barangays as $barangay){
            $result = Barangay::find($barangay->brgy_id);
            if (empty($result)){
                Barangay::create((array)$barangay);
            }
        }
    }

    private function city()
    {
        $cities = $this->query('
                SELECT
                city.*
                FROM
                prov
                INNER JOIN regions ON prov.reg_id = regions.reg_id
                INNER JOIN country ON regions.country_id = country.country_id
                INNER JOIN city ON city.province_id = prov.province_id
        ');
        foreach ($cities as $city){
            $result = City::find($city->city_id);
            if (empty($result)){
                City::create((array)$city);
            }
        }
    }

    private function province()
    {
        $provinces = $this->query('
            SELECT
            prov.*
            FROM
            prov ,
            regions
            INNER JOIN country ON regions.country_id = country.country_id
        ');
        foreach ($provinces as $province){
            $result = Province::find($province->province_id);
            if (empty($result)){
                Province::create((array)$province);
            }
        }
    }

    private function region()
    {
        $regions = $this->query('
            SELECT
            regions.*
            FROM
            regions
            INNER JOIN country ON regions.country_id = country.country_id
        ');
        foreach ($regions as $region){
            $result = Region::find($region->reg_id);
            if (empty($result)){
                Region::create((array)$region);
            }
        }
    }

    private function studentCurriculumUsed()
    {
        $student_curriculum = $this->query('
        SELECT
        curr_used.*
        FROM
        stud_sch_info
        INNER JOIN stud_prog_taken ON stud_prog_taken.ssi_id = stud_sch_info.ssi_id
        INNER JOIN stud_stat_list ON stud_prog_taken.stat_id = stud_stat_list.stat_id
        INNER JOIN curr_used ON curr_used.ssi_id = stud_sch_info.ssi_id
        WHERE stud_stat_list.stat_id = 1

        ');
        foreach ($student_curriculum as $curriculum){
            $result = CurriculumUsed::find($curriculum->cu_id);
            if (empty($result)){
                CurriculumUsed::create((array)$curriculum);
            }
        }
    }

    private function studentGrade()
    {
        $student_grades = $this->query('
                    SELECT
                    stud_grade.*
                    FROM
                    stud_sch_info
                    INNER JOIN stud_prog_taken ON stud_prog_taken.ssi_id = stud_sch_info.ssi_id
                    INNER JOIN stud_stat_list ON stud_prog_taken.stat_id = stud_stat_list.stat_id
                    INNER JOIN subject_enrolled ON subject_enrolled.ssi_id = stud_sch_info.ssi_id
                    INNER JOIN stud_grade ON stud_grade.se_id = subject_enrolled.se_id
                    WHERE stud_stat_list.stat_id = 1

        ');
        foreach ($student_grades as $grade){
            $result = StudentGrade::find($grade->sg_id);
            if (empty($result)){
                StudentGrade::create((array)$grade);
            }
        }
    }

    private function studentSubjectLogs()
    {
        $subject_logs = $this->query('
                SELECT
                stud_subject_logs.*
                FROM
                stud_sch_info
                INNER JOIN stud_prog_taken ON stud_prog_taken.ssi_id = stud_sch_info.ssi_id
                INNER JOIN stud_stat_list ON stud_prog_taken.stat_id = stud_stat_list.stat_id
                INNER JOIN subject_enrolled ON subject_enrolled.ssi_id = stud_sch_info.ssi_id
                INNER JOIN stud_subject_logs ON stud_subject_logs.ssi_id = stud_sch_info.ssi_id
                WHERE stud_stat_list.stat_id = 1
        ');
        foreach ($subject_logs as $log){
            $result = StudentSubjectLogs::find($log->stud_sub_id);
            if (empty($result)){
                StudentSubjectLogs::create((array)$log);
            }
        }
    }

    private function studentSubjectEnrolled()
    {
        $subject_enrolled = $this->query('
                SELECT
                subject_enrolled.*
                FROM
                stud_sch_info
                INNER JOIN stud_prog_taken ON stud_prog_taken.ssi_id = stud_sch_info.ssi_id
                INNER JOIN stud_stat_list ON stud_prog_taken.stat_id = stud_stat_list.stat_id
                INNER JOIN subject_enrolled ON subject_enrolled.ssi_id = stud_sch_info.ssi_id
                WHERE stud_stat_list.stat_id = 1
        ');

        foreach ($subject_enrolled as $enrolled){
            $result =  SubjectEnrolled::find($enrolled->se_id);

            if (empty($result)){

                $subject = $this->curriculum->select("
                        SELECT
                        `subject`.subj_name, 
                        (`subject`.lec_unit + `subject`.lab_unit ) AS subject_unit
                        FROM
                        sched_subj
                        INNER JOIN `subject` ON sched_subj.subj_id = `subject`.subj_id
                        WHERE sched_subj.ss_id = {$enrolled->ss_id}
                ");

                $enrolled = (array)$enrolled;
                //remove ss_id from sis database
                array_splice($enrolled,3, 1);
                $enrolled['subject_name'] = $subject[0]->subj_name;
                $enrolled['subject_unit'] = $subject[0]->subject_unit;

                SubjectEnrolled::create((array)$enrolled);
            }
        }
    }

    private function subjectEnrolledStatus()
    {
        $subjects_enrolled = $this->query('
         SELECT * FROM subject_enrolled_status
        ');
        foreach ($subjects_enrolled as $enrolled){
            $result = SubjectEnrolledStatus::find($enrolled->ses_id);
            if (empty($result)){
                SubjectEnrolledStatus::create((array)$enrolled);
            }
        }
    }

    private function usageStatus()
    {
        $program_status = $this->query('
                SELECT usage_status.*
                FROM stud_sch_info
                INNER JOIN stud_prog_taken ON stud_prog_taken.ssi_id = stud_sch_info.ssi_id
                INNER JOIN stud_stat_list ON stud_prog_taken.stat_id = stud_stat_list.stat_id
                INNER JOIN program_list ON stud_prog_taken.pl_id = program_list.pl_id
                INNER JOIN usage_status ON usage_status.pl_id = program_list.pl_id
                WHERE stud_stat_list.stat_id = 1
        ');
        foreach ($program_status as $status){
            $result = UsageStatus::find($status->us_id);
            if (empty($result)){
                UsageStatus::create((array)$status);
            }
        }
    }

    private function shiftHistory()
    {
        $histories = $this->query('
            SELECT shift_history.*
            FROM stud_sch_info
            INNER JOIN stud_prog_taken ON stud_prog_taken.ssi_id = stud_sch_info.ssi_id
            INNER JOIN stud_stat_list ON stud_prog_taken.stat_id = stud_stat_list.stat_id
            INNER JOIN stud_program ON stud_program.ssi_id = stud_sch_info.ssi_id
            INNER JOIN program_list ON stud_prog_taken.pl_id = program_list.pl_id AND stud_program.pl_id = program_list.pl_id
            INNER JOIN shift_history ON shift_history.sp_id = stud_program.sp_id
            WHERE stud_stat_list.stat_id = 1
        ');
        foreach ($histories as $history){
            $result = ShiftHistory::find($history->sh_id);
            if (empty($result)){
                ShiftHistory::create((array)$history);
            }
        }
    }

    private function studentProgram()
    {
        $student_programs = $this->query('
            SELECT stud_program.*
            FROM stud_sch_info
            INNER JOIN stud_prog_taken ON stud_prog_taken.ssi_id = stud_sch_info.ssi_id
            INNER JOIN stud_stat_list ON stud_prog_taken.stat_id = stud_stat_list.stat_id
            INNER JOIN stud_program ON stud_program.ssi_id = stud_sch_info.ssi_id
            INNER JOIN program_list ON stud_prog_taken.pl_id = program_list.pl_id AND stud_program.pl_id = program_list.pl_id
            WHERE stud_stat_list.stat_id = 1
        ');
        foreach ($student_programs as $program){
            $result = StudProgram::find($program->sp_id);
            if (empty($result)){
                StudProgram::create((array)$program);
            }
        }
    }

    private function scholarship()
    {
        $student_scholarships = $this->query('
        SELECT scholarship.*
        FROM
        stud_sch_info
        INNER JOIN scholarship ON scholarship.ssi_id = stud_sch_info.ssi_id
        INNER JOIN scholarship_list ON scholarship.sl_id = scholarship_list.sl_id
        INNER JOIN stud_prog_taken ON stud_prog_taken.ssi_id = stud_sch_info.ssi_id
        INNER JOIN stud_stat_list ON stud_prog_taken.stat_id = stud_stat_list.stat_id
        WHERE stud_stat_list.stat_id  = 1
        ');
        foreach ($student_scholarships as $scholarship){
            $result = Scholarship::find($scholarship->s_id);
            if (empty($result)){
                Scholarship::create((array)$scholarship);
            }
        }
    }

    private function schoolarshipList()
    {
        $scholarships = $this->query('SELECT * FROM scholarship_list');
        foreach ($scholarships as $scholarship){
            $result = ScholarshipList::find($scholarship->sl_id);
            if (empty($result)){
                ScholarshipList::create((array)$scholarship);
            }
        }
    }

    private function elementaryStudent()
    {
        $students = $this->query('
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

    private function studentEnrollmentStatus()
    {
        $student_status = $this->query('
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

    private function year()
    {
        $student_year = $this->query("
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

    private function schoolList()
    {
        $schools = $this->query('SELECT * FROM school_lists');
        foreach ($schools as $school){
            $result = SchoolList::find($school->sl_id);
            if (empty($result)){
                SchoolList::create((array)$school);
            }

        }
    }

    //todo verify the student main address table field
    private function studentMainAddress()
    {
        $addresses = $this->sis_database->select('
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
        $volunters = $this->query('
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

    private function studentBhContact()
    {
        $sbh_contacts = $this->query('
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
        $children = $this->query('
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

    private function studentInfo()
    {
        $students = $this->query('
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

    private function studentSchoolInfo()
    {
        $students = $this->query('
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

    private function studentType()
    {
        $types = $this->query('SELECT * FROM stud_type');
        foreach ($types as $type){
            $result = Stud_type::find($type->st_id);
            if (empty($result)){
                Stud_type::create((array)$type);
            }
        }
    }

    private function transactionHistory()
    {
        $trasactions = $this->query('
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

    private function studentProgramTaken()
    {
        $programs = $this->query('SELECT * FROM stud_prog_taken WHERE stat_id = 1');
        foreach ($programs as $program) {
            $result = Stud_prog_taken::find($program->spth_id);
            if (empty($result)) {
                Stud_prog_taken::create((array)$program);
            }
        }
    }

    private function programList()
    {
        $programs = $this->sis_database->select('
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

    private function studentStatusList()
    {
        $stats = $this->query('SELECT * FROM stud_stat_list');
        foreach ($stats as $stat) {
            $result = Stud_stat_list::find($stat->stat_id);
            if (empty($result)) {
                Stud_stat_list::create((array)$stat);
            }
        }
    }

    private function department()
    {
        $departments = $this->query('SELECT * FROM department');
        foreach ($departments as $department) {
            $result = Department::find($department->dep_id);
            if (empty($result)) {
                Department::create((array)$department);
            }
        }
    }

    private function country()
    {
        $countries = $this->query("SELECT * FROM country");
        foreach ($countries as $country) {
            $result = Country::find($country->country_id);
            if (empty($result)) {
                Country::create((array)$country);
            }
        }
    }

    private function citizenship()
    {
        $citizenships = $this->query('SELECT * FROM citizenship');
        foreach ($citizenships as $citizenship){
            $result = Citizenship::find($citizenship->cit_id);
            if (empty($result)){
                Citizenship::create((array)$citizenship);
            }
        }
    }

    private function query($query = null)
    {
        return $this->sis_database->select($query);
    }
}