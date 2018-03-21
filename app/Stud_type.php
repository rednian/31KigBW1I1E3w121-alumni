<?php

namespace Alumni;

use Illuminate\Database\Eloquent\Model;

class Stud_type extends Model
{
    protected $table ='stud_type';
    protected $primaryKey = 'st_id';
    protected $guarded = [];
}
