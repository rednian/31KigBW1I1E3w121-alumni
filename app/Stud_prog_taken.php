<?php

namespace Alumni;

use Illuminate\Database\Eloquent\Model;

class Stud_prog_taken extends Model
{
    protected $table = 'stud_prog_taken';
    protected $primaryKey = 'spth_id';
    protected $guarded = [];
}
