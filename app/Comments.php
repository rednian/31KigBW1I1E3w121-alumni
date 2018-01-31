<?php

namespace Alumni;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $table = 'comments';
    protected $primaryKey = 'comment_id';

    public function company_info(){

    	return $this->belongsTo('Alumni\Company', 'company_id');

    }
    public function alumnus_info(){

    	return $this->belongsTo('Alumni\Stud_sch_info', 'ssi_id');

    }

    public function replies(){
        return $this->hasMany('Alumni\Replies', 'comment_id');
    }

    // public function parents()
    // {
    // 	return $this->belongsToMany(Parents::class, 'parents_student', 'spi_id', 'parent_id')->withPivot('rel_id');
    // }

}
