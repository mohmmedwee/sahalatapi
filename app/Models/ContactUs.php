<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    protected $fillable = [
       "id","users_id","email","phone","comments","created_at","updated_at"    ];
    protected $table='contact_us';

    public $timestamps =true ;

    protected $guarded = [];

    public function users(){
    return $this->belongsTo('App\Models\Users');
    }








}
