<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeliverPackage extends Model
{
    protected $fillable = [
       "id","deliver_number","price","created_at","updated_at"    ];
    protected $table='deliver_package';

    public $timestamps =true ;

    protected $guarded = [];








}
