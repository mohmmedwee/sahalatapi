<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDriver extends Model
{
    protected $fillable = [
       "id","users_id","order_id","current_long","current_lat"
        ,"delivering_id","deliver_distance","deliver_time","return_distance","return_time"
        ,"deliver_start_hour","deliver_end_hour","return_start_hour","return_end_hour"
        ,"status","note","notification","created_at","updated_at"    ];
    protected $table='order_driver';

    public $timestamps =true ;

    protected $guarded = [];

    public function users(){
    return $this->belongsTo('App\Models\Users');
    }

    public function order(){
    return $this->belongsTo('App\Models\Order');
    }








}
