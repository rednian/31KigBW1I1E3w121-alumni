<?php

namespace Alumni;

use Illuminate\Database\Eloquent\Model;

class StudentEnrollmentStat extends Model
{
    protected $table = 'student_enrollment_stat';
    protected $primaryKey = 'ses_id';
    protected $guarded = [];
}
