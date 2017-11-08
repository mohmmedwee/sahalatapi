<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $fillable = [
       "email","username","mobile_company","driving_license_no","civil_id","password","permissions","first_name","last_name","avatar",'mobile','phone','gender','occupation','type','lat','long','session_id' ,'android_device_id','ios_device_id' ,'token'];
    protected $table='users';

    public $timestamps =false ;

    protected $guarded = [];

    public function address(){
        return $this->hasMany('\App\Models\Address','users_id');
    }

}
