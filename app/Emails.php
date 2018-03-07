<?php

namespace Alumni;

use Illuminate\Database\Eloquent\Model;

class Emails extends Model
{
    
	protected $table = "emails";
	protected $primaryKey = "email_id";

	protected $fillable = ["email"];

}
