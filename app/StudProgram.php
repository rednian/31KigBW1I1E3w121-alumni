<?php

namespace Alumni;

use Illuminate\Database\Eloquent\Model;

class StudProgram extends Model
{
    protected $table = 'stud_program';
    protected $primaryKey = 'sp_id';
    protected $guarded = [];
}
