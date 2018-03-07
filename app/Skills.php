<?php

namespace Alumni;

use Illuminate\Database\Eloquent\Model;

class Skills extends Model
{
    protected $table = "skills";
    protected $primaryKey = "skill_id";

    protected $guard = ['skill_id'];

}
