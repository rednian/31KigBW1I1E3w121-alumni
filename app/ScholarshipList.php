<?php

namespace Alumni;

use Illuminate\Database\Eloquent\Model;

class ScholarshipList extends Model
{
    protected $table = 'scholarship_list';
    protected $primaryKey = 'sl_id';
    protected $guarded = [];
}
