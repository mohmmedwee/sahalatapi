<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RestaurantCuisine extends Model
{
    protected $fillable = [
       "id","restaurant_id","cuisine_id"    ];
    protected $table='restaurant_cuisine';

    public $timestamps =false ;

    protected $guarded = [];

    public function restaurant(){
    return $this->belongsTo('App\Models\Restaurant');
    }

    public function cuisine(){
    return $this->belongsTo('App\Models\Cuisine');
    }








}
