<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Governorate extends Model
{
    protected $fillable = [
       "id","name_en","name_ar","created_at","updated_at"    ];
    protected $table='governorate';

    public $timestamps =true ;

    protected $guarded = [];




public function area(){
return $this->hasMany('App\Models\Area');
}


public function restaurant_area(){
return $this->hasMany('App\Models\RestaurantArea');
}






}
