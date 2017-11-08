<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceCompanyOrderService extends Model
{
    protected $fillable = [
       "id","service_company_order_id","service_id"    ];
    protected $table='service_company_order_service';

    public $timestamps =false ;

    protected $guarded = [];

    public function service_company_order(){
    return $this->belongsTo('App\Models\ServiceCompanyOrder');
    }

    public function service(){
    return $this->belongsTo('App\Models\Service');
    }








}
