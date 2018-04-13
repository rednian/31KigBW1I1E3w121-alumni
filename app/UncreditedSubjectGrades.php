<?php

namespace Alumni;

use Illuminate\Database\Eloquent\Model;

class UncreditedSubjectGrades extends Model
{
    protected $table = 'uncredited_subject_grades';
    protected $primaryKey = 'sg_id';
    protected $guarded = [];
}
