<?php

namespace Alumni;

use Illuminate\Database\Eloquent\Model;

class Partners extends Model
{
    protected $table = 'partner';

    protected $primaryKey = 'p_id';


    protected $fillable = [
      'title','address','tel_number','cel_number','image','email'
    ];


    protected function admin()
    {
      return $this->belongsTo('Alumni\Model\AdminModel');
    }
}
