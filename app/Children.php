<?php

namespace Alumni;

use Illuminate\Database\Eloquent\Model;

class Children extends Model
{
    protected $table = 'children';
    protected $primaryKey = 'children_id';
    protected $guarded = [];
}
