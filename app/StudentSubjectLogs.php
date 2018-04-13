<?php

namespace Alumni;

use Illuminate\Database\Eloquent\Model;

class StudentSubjectLogs extends Model
{
    protected $table = 'stud_subject_logs';
    protected $primaryKey = 'stud_sub_id';
    protected $guarded = [];
}
