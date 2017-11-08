<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = [
       "id","img","order","status","type","available_from","available_to",'url','default',"created_at","updated_at"    ];
    protected $table='banner';

    public $timestamps =true ;

    protected $guarded = [];








}
