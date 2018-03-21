<?php

namespace Alumni;

use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    protected $table = 'year';
    protected $primaryKey = 'y_id';
    protected $guarded = [];
}
