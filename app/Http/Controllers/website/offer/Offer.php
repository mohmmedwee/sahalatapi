<?php

namespace App\Http\Controllers\website\offer;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use App\Http\Requests\website\offer\createRequest;
use App\Http\Requests\website\offer\editRequest;
use Session;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;


use App\Models\Offer as mOffer;
use App\Repositories\website\offer\OfferContract as rOffer;


 use App\Repositories\website\restaurant_offer\RestaurantOfferContract as rRestaurantOffer;

class Offer extends Controller
{
    private $rOffer;

    public function __construct(rOffer $rOffer)
    {
        $this->rOffer=$rOffer;
    }
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index(Request $request)
    {

        $statistic=null;
        $oResults=$this->rOffer->getByFilter($request,$statistic);

        return view('website.offer.index', compact('oResults','request','statistic'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return view
     */
    public function create(Request $request)
    {


        return view('website.offer.create',compact('request'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return redirect
     */
    public function store(createRequest $request)
    {


        $oResults=$this->rOffer->create($request->all());

        return redirect('website/offer');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return view
     */
    public function show($id,Request $request,rRestaurantOffer $rRestaurantOffer)
    {


        $offer=$this->rOffer->show($id);
      $request->merge(['offer_id'=>$id,'page_name'=>'page']);


    $request->page_name='page_restaurant_offer';
    $oRestaurantOfferResults=$rRestaurantOffer->getByFilter($request);

        return view('website.offer.show', compact('offer','request','oRestaurantOfferResults'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return view
     */
    public function edit($id)
    {


        $offer=$this->rOffer->show($id);


        return view('website.offer.edit', compact('offer'));
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

        $result=$this->rOffer->update($id,$request);

        return redirect('website/offer');
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
        $offer=$this->rOffer->destroy($id);
        return redirect('website/offer');
    }


}
