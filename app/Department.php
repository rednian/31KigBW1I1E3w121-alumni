<?php

namespace Alumni;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'department';
    protected $primaryKey = 'dep_id';
    public $incrementing = false;
    protected $guarded = [];
}
