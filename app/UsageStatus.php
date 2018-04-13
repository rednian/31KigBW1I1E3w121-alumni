<?php

namespace Alumni;

use Illuminate\Database\Eloquent\Model;

class UsageStatus extends Model
{
    protected $table = 'usage_status';
    protected $primaryKey = 'us_id';
    protected $guarded = [];
}
