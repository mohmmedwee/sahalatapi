<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RestaurantArea extends Model
{
    protected $fillable = [
       "id","area_id","restaurant_id","delivery_charges","sahalat_charge","min_amount","deliver_time_from","deliver_time_to","status","governorate_id","created_at","updated_at"  ,"governrate_id"  ];
    protected $table='restaurant_area';

    public $timestamps =true ;

    protected $guarded = [];

    public function area(){
    return $this->belongsTo('App\Models\Area');
    }

    public function restaurant(){
    return $this->belongsTo('App\Models\Restaurant');
    }

    public function governorate(){
    return $this->belongsTo('App\Models\Governorate');
    }




public function operation_hour(){
return $this->hasMany('App\Models\OperationHour');
}






}
