<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
       "id","name_en","name_ar"    ];
    protected $table='service';

    public $timestamps =false ;

    protected $guarded = [];




public function service_company_order_service(){
return $this->hasMany('App\Models\ServiceCompanyOrderService');
}






}
