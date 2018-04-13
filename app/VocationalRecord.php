<?php

namespace Alumni;

use Illuminate\Database\Eloquent\Model;

class VocationalRecord extends Model
{
    protected $table = 'vacational_record';
    protected $primaryKey = 'vr_id';
    protected $guarded = [];
}
