<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RestaurantOffer extends Model
{
    protected $fillable = [
       "id","restaurant_id","offer_id","status","created_at","updated_at"    ];
    protected $table='restaurant_offer';

    public $timestamps =true ;

    protected $guarded = [];

    public function restaurant(){
    return $this->belongsTo('App\Models\Restaurant');
    }

    public function offer(){
    return $this->belongsTo('App\Models\Offer');
    }








}
