<?php

namespace Alumni;

use Illuminate\Database\Eloquent\Model;
use Alumni\Stud_per_info;

class Stud_sch_info extends Model
{
    protected $table = "stud_sch_info";
    protected $primaryKey = 'ssi_id';
    protected $guarded = [];


    public function student_per_info(){

    	return $this->belongsTo("Alumni\Stud_per_info", "spi_id");
    	
    }

    public function stud_program(){
    	return $this->hasMany("Alumni\Stud_program", "ssi_id");
    }



}