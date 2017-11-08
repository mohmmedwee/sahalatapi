<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cuisine extends Model
{
    protected $fillable = [
       "id","name_en","name_ar","status","description_en","description_ar","created_at","updated_at"    ];
    protected $table='cuisine';

    public $timestamps =true ;

    protected $guarded = [];




public function restaurant_cuisine(){
return $this->hasMany('App\Models\RestaurantCuisine');
}


public function dish(){
return $this->hasMany('App\Models\Dish');
}






}
