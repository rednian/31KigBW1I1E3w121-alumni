<?php

namespace Alumni\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class AdminModel extends Authenticatable
{

  use Notifiable;

  protected $guard = 'admin';

  protected $table = 'admin';

  protected $primaryKey = 'user_id';

  protected $hidden = [
    'password'
  ];

  protected $fillable = [
    'fname','midname','lastname','department','username','password','image_path'
  ];

}
