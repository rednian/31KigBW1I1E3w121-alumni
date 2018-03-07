<?php

namespace Alumni;

use Illuminate\Database\Eloquent\Model;

use Alumni\Student_phone;

class Student_phone extends Model
{
    protected $table = "student_phone";
    protected $primaryKey = "phone_id";
    protected $fillable = ["phone_id", "spi_id"];

    public function phone_numbers(){
    	return $this->hasOne("Alumni\Phone_numbers", "phone_id");
    }

}
