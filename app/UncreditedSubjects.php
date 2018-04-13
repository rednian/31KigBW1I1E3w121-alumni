<?php

namespace Alumni;

use Illuminate\Database\Eloquent\Model;

class UncreditedSubjects extends Model
{
    protected $table = 'uncredited_subjects';
    protected $primaryKey = 'ucs_id';
    protected $guarded = [];
}
