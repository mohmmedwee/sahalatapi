<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OperationHour extends Model
{
    protected $fillable = [
       "id","restaurant_area_id","restaurant_id","day","shift1_from","shift1_to","shift2_from","shift2_to","created_at","updated_at"    ];
    protected $table='operation_hour';

    public $timestamps =true ;

    protected $guarded = [];

    public function restaurant_area(){
    return $this->belongsTo('App\Models\RestaurantArea');
    }

    public function restaurant(){
    return $this->belongsTo('App\Models\Restaurant');
    }








}
