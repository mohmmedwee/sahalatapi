<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuSection extends Model
{
    protected $fillable = [
       "id","name_en","name_ar","restaurant_id","status","description_en","description_ar","created_at","updated_at"    ];
    protected $table='menu_section';

    public $timestamps =true ;

    protected $guarded = [];

    public function restaurant(){
    return $this->belongsTo('App\Models\Restaurant');
    }




public function dish(){
return $this->hasMany('App\Models\Dish');
}






}
