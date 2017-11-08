<?php namespace App\Http\Controllers\website\cuisine;

use notification2;
use App\Http\Requests;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use Session;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

use App\Models\Order;
use App\Repositories\website\area\AreaContract as rArea;
use App\Repositories\website\cuisine\CuisineContract as rCuisine;
use App\Repositories\website\restaurant\RestaurantContract as rRestaurant;

class Cuisine extends Controller
{

    public function __construct()
    {
    }
    /*****
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index(Request $request,rCuisine $rCuisine)
    {

    $oCuisines=$rCuisine->getByFilter($request);

    return view('website.cuisine.cuisine',compact('oCuisines','request'));
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



public function getallcuisine(Request $request,rCuisine $rCuisine){

$oCuisines=$rCuisine->getByFilter([]);

    return view('website.cuisine.cuisine',compact('oCuisines','request'));
}







}
