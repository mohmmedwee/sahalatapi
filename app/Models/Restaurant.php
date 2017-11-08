<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $fillable = [
       "id","name_en","name_ar","branch","Owner_first_name","Owner_last_name","email","available_payment","telephone","address_en","address_ar","description_en","description_ar","status","min_amount","working_hour_from","working_hour_to","deliver_time_from","deliver_time_to","deliver_charge","rating","show_menu","order_accept_days","offline_order","summary_en","summary_ar","url","img","commission_type","discount_type","discount","area_id","follow_us","notification","long",'lat'    ];
    protected $table='restaurant';

    public $timestamps =true ;

    protected $guarded = [];

    public function area(){
    return $this->belongsTo('App\Models\Area');
    }




public function category(){
return $this->hasMany('App\Models\Category');
}


public function delivery_menu(){
return $this->hasMany('App\Models\DeliveryMenu');
}


public function restaurant_rate(){
return $this->hasMany('App\Models\RestaurantRate');
}


public function restaurant_cuisine(){
return $this->hasMany('App\Models\RestaurantCuisine');
}


public function menu_section(){
return $this->hasMany('App\Models\MenuSection');
}


public function dish(){
return $this->hasMany('App\Models\Dish');
}


public function dish_rate(){
return $this->hasMany('App\Models\DishRate');
}


public function restaurant_area(){
return $this->hasMany('App\Models\RestaurantArea');
}


public function operation_hour(){
return $this->hasMany('App\Models\OperationHour');
}


public function cart(){
return $this->hasMany('App\Models\Cart');
}


public function restaurant_users(){
return $this->hasMany('App\Models\RestaurantUsers');
}



    public function branch(){
        return $this->belongsTo('App\Models\Restaurant','branch');
    }

public function cuisineList(){
    $list=[];
    $oCuisines=$this->restaurant_cuisine();
    if(count($oCuisines)){

foreach($oCuisines->get() as $oCuisine){
    $list[$oCuisine->cuisine_id]=isset($oCuisine->cuisine->name_en)? $oCuisine->cuisine->name_en:'';
}
    }
    
return $list;
}

}




