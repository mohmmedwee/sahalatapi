<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RestaurantRate extends Model
{
    protected $fillable = [
       "id","users_id","restaurant_id","rate","description","status","notification","created_at","updated_at"    ];
    protected $table='restaurant_rate';

    public $timestamps =true ;

    protected $guarded = [];

    public function users(){
    return $this->belongsTo('App\Models\Users');
    }

    public function restaurant(){
    return $this->belongsTo('App\Models\Restaurant');
    }








}
