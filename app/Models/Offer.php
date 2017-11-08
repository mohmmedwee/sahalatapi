<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $fillable = [
       "id","deliver_number","price","created_at","updated_at"    ];
    protected $table='offer';

    public $timestamps =true ;

    protected $guarded = [];




public function restaurant_offer(){
return $this->hasMany('App\Models\RestaurantOffer');
}






}
