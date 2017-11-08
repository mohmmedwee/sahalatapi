<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
       "id","order_id","users_id","amount","status","type","notification","created_at","updated_at"    ];
    protected $table='payment';

    public $timestamps =true ;

    protected $guarded = [];

    public function order(){
    return $this->belongsTo('App\Models\Order');
    }

    public function users(){
    return $this->belongsTo('App\Models\Users');
    }








}
