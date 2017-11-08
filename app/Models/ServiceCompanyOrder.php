<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceCompanyOrder extends Model
{
    protected $fillable = [
       "id","users_id","service_company_id","service_boy_id","description","status","notification","created_at","updated_at"    ];
    protected $table='service_company_order';

    public $timestamps =true ;

    protected $guarded = [];

    public function users(){
    return $this->belongsTo('App\Models\Users');
    }

    public function service_company(){
    return $this->belongsTo('App\Models\ServiceCompany');
    }

    public function service_boy(){
        return $this->belongsTo('App\Models\Users','service_boy_id');
    }
    public function driver(){
        return $this->belongsTo('App\Models\Users','users_id');
    }

    public function service(){
        return $this->hasMany('App\Models\ServiceCompanyOrderService','service_company_order_id');
    }
//
//    public function service()
//    {
//
//        return $this->hasManyThrough('App\Models\Service', 'App\Models\ServiceCompanyOrderService','id','id', 'service_company_order_id', 'ids');
//    }






}
