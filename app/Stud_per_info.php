<?php

namespace Alumni;

use Illuminate\Database\Eloquent\Model;

class Stud_per_info extends Model
{
    protected $table 		= "stud_per_info";
    protected $primaryKey 	= "spi_id";

    protected $fillable = ["cit_id", "fname", "mname", "lname", "suffix", "birthdate", "birthplace", "gender", "civ_status", "weight", "height", "blood_type", "religion"];

    public function stud_image(){
    	return $this->hasOne('Alumni\Stud_image', 'spi_id');
    }

    public function citizenship(){
    	return $this->belongsTo("Alumni\Citizenship", 'cit_id');
    }

    public function contact_number(){
    	return $this->hasMany("Alumni\Student_phone", "spi_id");
    }

    public function address(){
        return $this->hasMany("Alumni\S_main_address", "spi_id");
    }

    public function email_address(){
    	return $this->hasMany("Alumni\Email_student", "spi_id");
    }

    public function language_student(){
        return $this->hasMany("Alumni\Language_student", "spi_id");
    }

    public function parents_student(){
        return $this->hasMany("Alumni\Parents_student", "spi_id");
    }


    // Unfinished business 

    public function elementary_info(){
        return $this->hasMany("Alumni\Elementary_student", "spi_id");
    }

    public function highschool_info(){
        return $this->hasMany("Alumni\Hschool_Student", "spi_id");
    }

    // End Of Unfinished business   


    public function eligibilities(){
        return $this->hasMany("Alumni\Eligibilities", "spi_id");
    }

    public function work_experience(){
        return $this->hasMany("Alumni\Work_experiences", "spi_id");
    }

    public function services(){
        return $this->hasMany("Alumni\Services", "spi_id");
    }

    public function trainings(){
        return $this->hasMany("Alumni\Trainings", "spi_id");
    }

    public function affiliation(){
        return $this->hasMany("Alumni\Affiliations", "spi_id");
    }

    public function awards(){
        return $this->hasMany("Alumni\Awards", "spi_id");
    }

    public function skills(){
        return $this->hasOne("Alumni\Skills", "spi_id");
    }

    public function references(){
        return $this->hasMany("Alumni\References", "spi_id");
    }
    
}