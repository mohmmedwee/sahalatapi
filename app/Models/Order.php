<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Knet as mKnet;

class Order extends Model
{
    protected $fillable = [
       "id","success_order_id","users_id","restaurant_id","area_id","from_id","address_id","order_time","deliver_time","expected_time","deliver_date","note","deliver_charge","sahalat_charge","extra_charge","sub_total","total",  "rate","point","status","archive","notification","created_at","updated_at"    ];
    protected $table='order';

    public $timestamps =true ;

    protected $guarded = [];

    public function users(){
    return $this->belongsTo('App\Models\Users');
    }
    public function restaurant(){
        return $this->belongsTo('App\Models\Restaurant');
    }
    public function area(){
    return $this->belongsTo('App\Models\Area');
    }

    public function address(){
    return $this->belongsTo('App\Models\Address');
    }



    public function cart(){
        return $this->hasMany('App\Models\Cart');
    }


    public function payment(){
        return $this->hasMany('App\Models\Payment');
    }



    public function branch(){
        return $this->belongsTo('App\Models\Restaurant','branch');
    }



    public function new_success_order_id(){
        $oResults=Order::where('restaurant_id','=',$this->restaurant_id)->max('success_order_id');

        $oResults=ltrim($oResults,$this->restaurant_id);
        return $this->restaurant_id.'000'.(floatval($oResults)*1 + 1 );
    }

    public function transaction_id(){
        $oKnet=mKnet::where(['order_id'=>$this->success_order_id,])->first();

        return count($oKnet)?$oKnet->TranID:'';

    }
}
