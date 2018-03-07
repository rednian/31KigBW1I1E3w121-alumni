<?php
namespace Alumni\Library;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Graduate {

  protected $alumni;

  public function __construct() {
    $this->alumni = DB::connection('sis_main_db');
  }

  public function country()
  {
      return  $data = $this->alumni->select("SELECT * FROM country");
  }
}