<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DishRate extends Model
{
    protected $fillable = [
       "id","users_id","dish_id","rate","description","status","notification","created_at","updated_at"    ];
    protected $table='dish_rate';

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








}
