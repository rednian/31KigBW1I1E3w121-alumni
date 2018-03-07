<?php

namespace Alumni;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Graduates extends Model
{
    
	protected $table = "stud_prog_taken";
	protected $primaryKey = "spth_id";

	public static function graduatesList(){


		$list = DB::table('stud_prog_taken')
				->join('stud_stat_list', 'stud_prog_taken.stat_id', '=', 'stud_stat_list.stat_id')
				->join('program_list', 'stud_prog_taken.pl_id', '=', 'program_list.pl_id')
				->join('stud_sch_info', 'stud_prog_taken.ssi_id', '=', 'stud_sch_info.ssi_id')
				->join('stud_per_info', 'stud_sch_info.spi_id', '=', 'stud_per_info.spi_id')
				->select(

							'stud_prog_taken.ssi_id',
							'stud_prog_taken.stat_id',
							'stud_prog_taken.pl_id', 
							'stud_prog_taken.semester', 
							'stud_prog_taken.sch_year', 

							'stud_stat_list.stat_name',
							
							'program_list.prog_code',
							'program_list.prog_abv',
							'program_list.prog_name',

							'stud_sch_info.stud_id',
							'stud_sch_info.spi_id',

							'stud_per_info.fname',
							'stud_per_info.mname',
							'stud_per_info.lname',
							'stud_per_info.suffix',
							'stud_per_info.birthdate',
							'stud_per_info.gender'
						)
				->where('stud_prog_taken.stat_id', '=', 1)
				->orderBy('stud_prog_taken.sch_year', 'desc')
				->orderBy('stud_prog_taken.semester', 'desc')
				->get();



		return $list;


	}

	public static function new_alumnus($username_id, $password_id){ // this is for checking if the user is is an alumnus

		if( $username_id != $password_id ){
			return null;
		}

		$alumnus = DB::select("SELECT

								stud_prog_taken.ssi_id,
								stud_prog_taken.stat_id,
								stud_prog_taken.pl_id,
								stud_prog_taken.sch_year,

								stud_stat_list.stat_name,

								program_list.prog_name,
								program_list.prog_abv,

								stud_sch_info.stud_id,
								stud_sch_info.spi_id,

								stud_per_info.fname,
								stud_per_info.mname,
								stud_per_info.lname,
								stud_per_info.suffix,
								stud_per_info.birthdate,
								stud_per_info.gender

							FROM stud_prog_taken

							INNER JOIN stud_stat_list
							ON stud_prog_taken.stat_id = stud_stat_list.stat_id

							INNER JOIN program_list
							ON stud_prog_taken.pl_id = program_list.pl_id

							INNER JOIN stud_sch_info
							ON stud_prog_taken.ssi_id = stud_sch_info.ssi_id

							INNER JOIN stud_per_info
							ON stud_sch_info.spi_id = stud_per_info.spi_id

							WHERE 
								stud_sch_info.stud_id = '{$username_id}'
							");

		return $alumnus;
	}

	public static function grad_alumnus_info($ssi_id){

		$info = Graduates::where('ssi_id', $ssi_id)
  						   ->where('stat_id', 1)
						   ->first();

		return $info;

	}

}
