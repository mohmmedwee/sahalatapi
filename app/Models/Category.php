<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
       "id","name_en","name_ar","min_quantity","max_quantity","restaurant_id"    ];
    protected $table='category';

    public $timestamps =true ;

    protected $guarded = [];

    public function restaurant(){
    return $this->belongsTo('App\Models\Restaurant');
    }




public function dish(){
return $this->hasMany('App\Models\Dish');
}






}
