<?php

namespace Alumni;

use Illuminate\Database\Eloquent\Model;

class Parents_student extends Model
{
    protected $table = "parents_student";
    protected $primaryKey = "ps_id";

    public function relationship(){
    	return $this->hasOne("Alumni\Relationship", "rel_id");
    }

    public function parent_info(){
    	return $this->hasOne("Alumni\Parents", "parent_id");
    }

}
