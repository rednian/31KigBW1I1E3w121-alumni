<?php

namespace Alumni\Model;

use Illuminate\Database\Eloquent\Model;

class AdminModel extends Model
{
  protected $table = 'admin';
  protected $primaryKey = 'user_id';
  protected $fillable = ['fname','midname','lastname','department','username','password','image_path'];

}
