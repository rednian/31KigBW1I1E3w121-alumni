<?php

namespace Alumni;

use Illuminate\Database\Eloquent\Model;

class Work_experiences extends Model
{
    
	protected $table 	  = "work_experiences";
	protected $primaryKey = "work_exp_id";

	protected $guarded   = ['work_exp_id'];

}
