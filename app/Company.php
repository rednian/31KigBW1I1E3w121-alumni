<?php

namespace Alumni;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
	protected $table 		= "company_info";
	protected $primaryKey 	= "company_id";
  protected $fillable = [
    'company_name','company_logo','business_information','mobile_number','telephone_number','status',
    'address','map_location','mission','vission','goals',
    'registration_date','expiration_date','email'
  ];

  public function accounts()
  {
    return $this->hasMany(Accounts::class,'company_id');
  }

}
