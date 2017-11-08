<?php

namespace App\Http\Controllers\website\dashboard;

use notification2;
use App\Http\Requests;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use Session;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

use App\Models\Order;
use App\Models\Cart;
use App\Repositories\website\cart\CartContract as rCart;
use App\Repositories\website\area\AreaContract as rArea;
use App\Repositories\website\cuisine\CuisineContract as rCuisine;
use App\Repositories\website\restaurant\RestaurantContract as rRestaurant;

class DashboardController extends Controller
{

    public function __construct()
    {
    }
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index(Request $request,rCuisine $rCuisine,rArea $rArea,rRestaurant $rRestaurant ,rCart $rCart)
    {


        $oCuisines=$rCuisine->getByFilter([]);
        $aCuisines=[''=>trans('website.selectCuisine')]; foreach($oCuisines as $oCuisine){$aCuisines[$oCuisine->id]=$oCuisine->{'name_'.config('app.locale')};}

        $oRestaurants=$rRestaurant->getByFilter([]);
        $aRestaurants=[''=>trans('website.selectRestaurant')]; foreach($oRestaurants as $oRestaurant){$aRestaurants[$oRestaurant->id]=$oRestaurant->{'name_'.config('app.locale')};}


        $oAreas=$rArea->getByFilter([]);
        $aAreas=[''=>trans('website.selectArea')]; foreach($oAreas as $oArea){$aAreas[$oArea->id]=$oArea->{'name_'.config('app.locale')};}

        $currentOrder=Order::with('users','restaurant','area')->where('status',config('array.order_status_payed_index'))->orderBy('id','desc')->limit(10)->get();

        $oCartResults=Cart::limit(10)->get();
       
          


        return view('website.dashboard.index', compact('aCuisines','aRestaurants','aAreas','currentOrder','oCartResults'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function show($id)
    {


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function edit($id)
    {


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function update($id, Request $request)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function destroy($id)
    {

    }



// public function getallcuisine(Request $request,rCuisine $rCuisine){

// $oCuisines=$rCuisine->getByFilter([]);

//     return view('website.cuisine.cuisine',compact('oCuisines','request'));
// }







}
