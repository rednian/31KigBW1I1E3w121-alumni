<?php

namespace Alumni;

use Illuminate\Database\Eloquent\Model;

class CurriculumUsed extends Model
{
    protected $table = 'curr_used';
    protected $primaryKey = 'cu_id';
    protected $guarded = [];
}
