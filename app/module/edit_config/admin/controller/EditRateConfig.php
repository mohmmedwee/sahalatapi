<?php

namespace App\module\edit_config\admin\controller;


use App\Http\Requests;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use Session;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

use App\module\edit_config\admin\controller\Helper;


class EditRateConfig extends Controller
{

public function __construct()
{

}
/**
* Display a listing of the resource.
*
* @return void
*/
public function index(Request $request)
{


    $helper=new Helper();
    $helper->editConfig(['restaurant_rate'=>(config('module.restaurant_rate') ==config('module.restaurant_rate_active_index'))? config('module.restaurant_rate_not_active_index'):config('module.restaurant_rate_active_index')]);


return Redirect::back();
}





}
