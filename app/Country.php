<?php

namespace Alumni;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = "country";
    protected $primaryKey = "country_id";
    protected $guarded = [];

    public function provinces()
    {
    	return $this->hasMany(Province::class, 'country_id');
    }

    public function addresses()
    {
    	return $this->hasMany(Address::class, 'country_id');
    }

    public function regions()
    {
        return $this->hasMany(Region::class, 'country_id');
    }

}
