<?php

namespace Alumni;

use Illuminate\Database\Eloquent\Model;

class Languages extends Model
{
    protected $table = "languages";
    protected $primaryKey = "language_id";
    protected $fillable = ["language"];
}
