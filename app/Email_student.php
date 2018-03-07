<?php

namespace Alumni;

use Illuminate\Database\Eloquent\Model;

class Email_student extends Model
{
    
	protected $table = "email_student";
	protected $primaryKey = "stud_email_id";
	protected $fillable = ["email_id", "spi_id"];

	public function emails(){
		
		return $this->belongsTo("Alumni\Emails", "email_id");

	}

}
