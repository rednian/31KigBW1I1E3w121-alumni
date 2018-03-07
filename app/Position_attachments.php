<?php

namespace Alumni;

use Illuminate\Database\Eloquent\Model;

use Alumni\Posts;

class Position_attachments extends Model
{
    protected $table      = "position_attachments";
    protected $primaryKey = "position_attachment_id";
    protected $guarded    = ["position_attachment_idn"];


    public function positions(){
    	
    	return $this->hasMany("Alumni\Posts", "pl_id");

    }

     public static function recommendedJobs($user){

        $pl_id         = $user->alumnus_info->stud_program[0]->program_list->pl_id;
        $get_positions = Position_attachments::where('pl_id', '=', $pl_id)->get();

        $position_ids = [];

        foreach ($get_positions as $key => $value) {
        	array_push($position_ids, $value['position_id']);
        }

        $posts = Posts::whereIn('position_id', $position_ids)->with('company')->paginate(10, ['*'], 'int_page');
        return $posts;
    }   

}
