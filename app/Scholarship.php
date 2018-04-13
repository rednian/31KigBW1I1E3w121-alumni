<?php

namespace Alumni;

use Illuminate\Database\Eloquent\Model;

class Scholarship extends Model
{
    protected $table = 'scholarship';
    protected $primaryKey = 's_id';
    protected $guarded = [];
}
