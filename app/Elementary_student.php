<?php

namespace Alumni;

use Illuminate\Database\Eloquent\Model;

class Elementary_student extends Model
{
    protected $table = "elementary_student";
    protected $primaryKey = "elementary_id";
    protected $guarded = [];

    public function elementary_address(){
    	return $this->hasOne("Alumni\Elementary_address", "elementary_id");
    }

    public function school()
    {
        return $this->belongsTo(SchoolList::class, 'sl_id');
    }

    public function addresses()
    {
        return $this->belongsToMany(Address::class, 'elementary_address', 'elementary_id', 'add_id')->withTimestamps();
    }

}
