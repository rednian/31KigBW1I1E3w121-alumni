<?php

namespace Alumni;

use Illuminate\Database\Eloquent\Model;

class Phone_numbers extends Model
{
    protected $table = "phone_numbers";
    protected $primaryKey = "phone_id";

    protected $fillable = ["phone_number"];
}
