<?php

namespace Alumni;


use Alumni\Model\AdminModel;
use Illuminate\Database\Eloquent\Model;

class Partners extends Model
{
    protected $table = 'partner';

    protected $primaryKey = 'p_id';


    protected $fillable = [
      'title','address','tel_number','cel_number','image','email',
      'name','address','telephone_number','mobile_number','logo','email', 'status'
    ];


    protected function admin()
    {
      return $this->belongsTo(AdminModel::class);
    }
}
