<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RestaurantNotification extends Model
{
    protected $fillable = [
       "id","restaurant_id","order_status","status","created_at","updated_at"    ];
    protected $table='restaurant_notification';

    public $timestamps =true ;

    protected $guarded = [];

    public function restaurant(){
    return $this->belongsTo('App\Models\Restaurant');
    }








}
