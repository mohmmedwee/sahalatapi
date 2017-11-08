<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
       "id","users_id","area_id","name","type","first_name","last_name","paci_number","block","street","judda","avenue","building","floor","apartment_number","mobile","phone","long","lat","directions","default","notification","created_at","updated_at"    ];
    protected $table='address';

    public $timestamps =true ;

    protected $guarded = [];

    public function users(){
    return $this->belongsTo('App\Models\Users');
    }

    public function area(){
    return $this->belongsTo('App\Models\Area');
    }








}
