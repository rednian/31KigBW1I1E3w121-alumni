<?php

namespace Alumni;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $table = "regions";
    protected $primaryKey = "reg_id";
    protected $guarded=[];

    public function country()
    {
    	return $this->belongsTo(Country::class, 'country_id');
    }

    public function provinces()
    {
    	return $this->hasMany(Province::class, 'reg_id');
    }
}
