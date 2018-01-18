<?php

namespace Alumni\Model;

use Illuminate\Database\Eloquent\Model;
class AdminModel extends Model
{
  protected $table = 'admin';
  protected $primaryKey = 'user_id';
  protected $hidden = ['password'];
  protected $fillable = ['fname','lastname','department','username','password'];

}
