<?php

namespace Alumni;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table = "prov";
    protected $primaryKey = "province_id";
    protected $fillable = ['province_name', 'country_id'];

    public function country()
    {
    	return $this->belongsTo(Country::class, 'country_id');
    }

    public function cities()
    {
    	return $this->hasMany(City::class, 'province_id');
    }

    public function addresses()
    {
    	return $this->hasMany(Address::class, 'province_id');
    }

    public function region(){
        return $this->hasOne(Region::class,"reg_id");
    }
}
