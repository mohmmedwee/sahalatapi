<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentWay extends Model
{
    protected $fillable = [
       "id","restaurant_id","payment_type","commission","type","created_at","updated_at"    ];
    protected $table='payment_way';

    public $timestamps =true ;

    protected $guarded = [];

    public function restaurant(){
    return $this->belongsTo('App\Models\Restaurant');
    }








}
