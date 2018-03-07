<?php

namespace Alumni;

use Illuminate\Database\Eloquent\Model;

class Elementary_address extends Model
{
    protected $table = "elementary_address";
    protected $primaryKey = "elem_add_id";

    public function address(){
    	return $this->hasOne("Alumni\Address", "add_id");
    }

}
