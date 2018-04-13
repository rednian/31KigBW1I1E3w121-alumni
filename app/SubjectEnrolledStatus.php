<?php

namespace Alumni;

use Illuminate\Database\Eloquent\Model;

class SubjectEnrolledStatus extends Model
{
    protected $table = 'subject_enrolled_status';
    protected $primaryKey = 'ses_id';
    protected $guarded = [];
}
