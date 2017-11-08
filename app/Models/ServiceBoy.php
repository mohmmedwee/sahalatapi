<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceBoy extends Model
{
    protected $fillable = [
       "id","users_id","manager_id","service_company_id","status","created_at","updated_at"    ];
    protected $table='service_boy';

    public $timestamps =true ;

    protected $guarded = [];

    public function users(){
    return $this->belongsTo('App\Models\Users');
    }

    public function service_company(){
    return $this->belongsTo('App\Models\ServiceCompany');
    }








}
