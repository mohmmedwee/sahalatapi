<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Knet extends Model
{
    protected $fillable = [
       "id","payment_id","users_id","order_id","PaymentID","Result","PostDate","TranID","Auth","Ref","TrackID","amount","UDF1","UDF2","UDF3","UDF4","UDF5","created_at","updated_at"    ];
    protected $table='knet';

    public $timestamps =true ;

    protected $guarded = [];

    public function payment(){
    return $this->belongsTo('App\Models\Payment');
    }

    public function users(){
    return $this->belongsTo('App\Models\Users');
    }

    public function order(){
    return $this->belongsTo('App\Models\Order');
    }








}
