<?php

namespace Alumni;

use Illuminate\Database\Eloquent\Model;

class StudentGrade extends Model
{
    protected $table = 'stud_grade';
    protected $primaryKey = 'sg_id';
    protected $guarded = [];
}
