<?php

namespace Alumni;

use Illuminate\Database\Eloquent\Model;

class SubjectEnrolled extends Model
{
    protected $table = 'subject_enrolled';
    protected $primaryKey = 'se_id';
    protected $guarded = [];
}
