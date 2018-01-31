<?php

namespace Alumni;

use Illuminate\Database\Eloquent\Model;

class Stud_per_info extends Model
{
    protected $table 		= "stud_per_info";
    protected $primaryKey 	= "spi_id";

    public function stud_image(){

    	return $this->hasOne('Alumni\Stud_image', 'spi_id');

    }

}
