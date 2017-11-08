<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $fillable = [
       "id","name_en","name_ar","governorate_id","description_en","description_ar","created_at","updated_at"    ];
    protected $table='area';

    public $timestamps =true ;

    protected $guarded = [];

    public function governorate(){
    return $this->belongsTo('App\Models\Governorate');
    }




public function restaurant(){
return $this->hasMany('App\Models\Restaurant');
}


public function restaurant_area(){
return $this->hasMany('App\Models\RestaurantArea');
}


public function address(){
return $this->hasMany('App\Models\Address');
}






}
