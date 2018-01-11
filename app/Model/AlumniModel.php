<?php

namespace Alumni\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AlumniModel extends Model
{
    
	public function getIdInfo($username){
		
		$account = DB::select('select * from accounts where username = ?', [$username]);

		if($account){
			return $array = ["account" => $account, "type" => "old"];
		}else{

			$check_alumnus = DB::select("	
											SELECT
												stud_prog_taken.ssi_id,
												stud_prog_taken.stat_id,
												stud_stat_list.stat_name,
												stud_stat_list.stat_id,
												stud_sch_info.stud_id,
												stud_sch_info.ssi_id,
												stud_sch_info.spi_id,
												stud_per_info.fname,
												stud_per_info.mname,
												stud_per_info.lname
											FROM
												stud_prog_taken
											INNER JOIN stud_stat_list ON stud_prog_taken.stat_id = stud_stat_list.stat_id
											INNER JOIN stud_sch_info ON stud_prog_taken.ssi_id = stud_sch_info.ssi_id
											INNER JOIN stud_per_info ON stud_sch_info.spi_id = stud_per_info.spi_id

											WHERE 
												stud_sch_info.stud_id = ?

										",  [$username]);

			if($check_alumnus){

				return ["account" => $check_alumnus, "type" => "new"];
			}
			else{
				return 0;
			}


		}

	}
	
}
