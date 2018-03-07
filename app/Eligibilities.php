<?php

namespace Alumni;

use Illuminate\Database\Eloquent\Model;

class Eligibilities extends Model
{
    protected $table 	  = "eligibilities";
    protected $primaryKey = "eligibility_id";
	protected $fillable   = ["spi_id", "type", "rank", "rating", "place_of_exam", "date_of_exam"];

}
