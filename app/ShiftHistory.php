<?php

namespace Alumni;

use Illuminate\Database\Eloquent\Model;

class ShiftHistory extends Model
{
    protected $table  = 'shift_history';
    protected $primaryKey = 'sh_id';
    protected $guarded = [];
}
