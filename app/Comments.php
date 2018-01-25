<?php

namespace Alumni;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $table = 'comments';
    protected $primaryKey = 'comment_id';

    public function company_comments(){

    	return $this->belongsTo('Alumni\Company', 'company_id');

    }

}
