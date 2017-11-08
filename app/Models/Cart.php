<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
       "id","users_id","restaurant_id","dish_id","order_id","deliver_charge","quantity","unit_price","total_price","special_request","created_at","updated_at"    ];
    protected $table='cart';

    public $timestamps =true ;

    protected $guarded = [];

    public function users(){
    return $this->belongsTo('App\Models\Users');
    }

    public function restaurant(){
    return $this->belongsTo('App\Models\Restaurant');
    }

    public function dish(){
    return $this->belongsTo('App\Models\Dish');
    }

    public function order(){
    return $this->belongsTo('App\Models\Order');
    }








}
