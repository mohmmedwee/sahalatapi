<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cms extends Model
{
    protected $fillable = [
       "id","title_en","title_ar","alias","content_en","content_ar","created_at","updated_at"    ];
    protected $table='cms';

    public $timestamps =true ;

    protected $guarded = [];








}
