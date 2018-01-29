<?php

namespace Alumni;

use Illuminate\Database\Eloquent\Model;

class Stud_program extends Model
{
    protected $table 		= "stud_program";
    protected $primaryKey 	= "sp_id";

    
    public function program_list(){
    	return $this->belongsTO("Alumni\Program_list", "pl_id");
    }
    
}
