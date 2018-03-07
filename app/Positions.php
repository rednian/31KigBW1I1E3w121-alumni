<?php

namespace Alumni;

use Illuminate\Database\Eloquent\Model;

class Positions extends Model
{
    protected $table      = "positions";
    protected $primaryKey = "position_id";
    protected $guarded	  = "position_id";
}
