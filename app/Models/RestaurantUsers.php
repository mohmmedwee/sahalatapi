<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RestaurantUsers extends Model
{
    protected $fillable = [
       "id","users_id","restaurant_id","status","type","created_at","updated_at"    ];
    protected $table='restaurant_users';

    public $timestamps =true ;

    protected $guarded = [];

    public function users(){
    return $this->belongsTo('App\Models\Users');
    }

    public function restaurant(){
        return $this->belongsTo('App\Models\Restaurant');
    }

//    public function order()
//    {
//         $this->primaryKey = 'users_id';
//        return $this->belongsToMany('App\Models\Order', 'order_driver', 'users_id', 'order_id','users_id');
//    }



}
