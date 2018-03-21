<?php

namespace Alumni;

use Illuminate\Database\Eloquent\Model;

class Trans_history extends Model
{
    protected $table = 'trans_history';
    protected $primaryKey = 'th_id';
    protected $guarded = [];
}
