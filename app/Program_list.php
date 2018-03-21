<?php

namespace Alumni;

use Illuminate\Database\Eloquent\Model;

class Program_list extends Model
{
    
	protected $table 		= 'program_list';
	protected $primaryKey 	= 'pl_id';
	protected $guarded = [];
//	protected $fillable = ['prog_code','prog_abv','prog_name','prog_desc','prog_type','level','major','senior_high_track'];
}
