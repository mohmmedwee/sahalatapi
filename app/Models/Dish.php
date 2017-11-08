<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    protected $fillable = [
       "id","name_en","name_ar","restaurant_id","best_seller","cuisine_id","menu_section_id","category_id","delivery_menu_id","parent_id","price","quantity","img","discount","available_from","available_to","description_en","description_ar","status","rating","created_at","updated_at"  ,"preparation_time" , "description" , "nutrition_facts" , "ingredients"    ];
    protected $table='dish';

    public $timestamps =true ;

    protected $guarded = [];

    public function restaurant(){
    return $this->belongsTo('App\Models\Restaurant');
    }

    public function cuisine(){
    return $this->belongsTo('App\Models\Cuisine');
    }

    public function menu_section(){
    return $this->belongsTo('App\Models\MenuSection');
    }

    public function category(){
    return $this->belongsTo('App\Models\Category');
    }

    public function delivery_menu(){
    return $this->belongsTo('App\Models\DeliveryMenu');
    }




public function cart(){
return $this->hasMany('App\Models\Cart');
}






}
