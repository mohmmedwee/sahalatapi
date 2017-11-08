<?php

namespace App\Http\Controllers\website\restaurant_offer;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use App\Http\Requests\website\restaurant_offer\createRequest;
use App\Http\Requests\website\restaurant_offer\editRequest;
use Session;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;


use App\Models\RestaurantOffer as mRestaurantOffer;
use App\Repositories\website\restaurant_offer\RestaurantOfferContract as rRestaurantOffer;


 use App\Repositories\website\restaurant\RestaurantContract as rRestaurant;
 use App\Repositories\website\offer\OfferContract as rOffer;

class RestaurantOffer extends Controller
{
    private $rRestaurantOffer;

    public function __construct(rRestaurantOffer $rRestaurantOffer)
    {
        $this->rRestaurantOffer=$rRestaurantOffer;
    }
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index(Request $request)
    {

        $statistic=null;
        $oResults=$this->rRestaurantOffer->getByFilter($request,$statistic);

        return view('website.restaurant_offer.index', compact('oResults','request','statistic'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return view
     */
    public function create(Request $request,rRestaurant $rRestaurant,rOffer $rOffer)
    {

$restaurantList=$rRestaurant->getAllList();
$offerList=$rOffer->getAllList();

        return view('website.restaurant_offer.create',compact('request','restaurantList','offerList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return redirect
     */
    public function store(createRequest $request)
    {


        $oResults=$this->rRestaurantOffer->create($request->all());

        return redirect('website/restaurant_offer');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return view
     */
    public function show($id,Request $request)
    {
    

        $restaurant_offer=$this->rRestaurantOffer->show($id);
      $request->merge(['restaurant_offer_id'=>$id,'page_name'=>'page']);



        return view('website.restaurant_offer.show', compact('restaurant_offer','request'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return view
     */
    public function edit($id,rRestaurant $rRestaurant,rOffer $rOffer)
    {


        $restaurant_offer=$this->rRestaurantOffer->show($id);


 $restaurantList=$rRestaurant->getAllList();
 $offerList=$rOffer->getAllList();
        return view('website.restaurant_offer.edit', compact('restaurant_offer','restaurantList','offerList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     *
     * @return redirect
     */
    public function update($id, editRequest $request)
    {

        $result=$this->rRestaurantOffer->update($id,$request);

        return redirect('website/restaurant_offer');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return redirect
     */
    public function destroy($id)
    {
        $restaurant_offer=$this->rRestaurantOffer->destroy($id);
        return redirect('website/restaurant_offer');
    }


}
