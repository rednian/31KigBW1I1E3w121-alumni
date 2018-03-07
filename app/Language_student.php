<?php

namespace Alumni;

use Illuminate\Database\Eloquent\Model;

class Language_student extends Model
{
    
	protected $table = "language_student";
	protected $primaryKey = "language_student_id";
	protected $fillable = ["language_id", "spi_id"];

	public function languages(){
		return $this->belongsTo("Alumni\Languages", "language_id");
	}

}
