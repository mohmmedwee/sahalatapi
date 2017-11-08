<?php

namespace App\Http\Controllers\common\dashboard;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use Session;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

use App\Repositories\admin\order\OrderContract as rOrder;
use App\Repositories\admin\restaurant\RestaurantContract as rRestaurant;
use App\Repositories\admin\restaurant_rate\RestaurantRateContract as rRestaurantRate;
use App\Repositories\admin\dish_rate\DishRateContract as rDishRate;
use App\Repositories\admin\payment\PaymentContract as rPayment;
use App\Repositories\admin\order_driver\OrderDriverContract as rOrderDriver;
use App\Repositories\admin\cart\CartContract as rCart;
use App\Repositories\admin\service_company_order\ServiceCompanyOrderContract as rServiceCompanyOrder;

class Notification extends Controller
{

public $rOrder;
    public $rRestaurant;
    public $rRestaurantRate;
    public $rDishRate;
    public $rPayment;
    public $rOrderDriver;
    public $rCart;
    public $rServiceCompanyOrder;

    public function __construct(rOrder $rOrder,rRestaurant $rRestaurant,rRestaurantRate $rRestaurantRate,rDishRate $rDishRate,rPayment $rPayment,rOrderDriver $rOrderDriver,rCart $rCart,rServiceCompanyOrder $rServiceCompanyOrder)
    {

        $this->rOrder= $rOrder;
        $this->rRestaurant= $rRestaurant;
        $this->rRestaurantRate= $rRestaurantRate;
        $this->rDishRate= $rDishRate;
        $this->rPayment= $rPayment;
        $this->rOrderDriver =$rOrderDriver;
        $this->rCart =$rCart;
        $this->rServiceCompanyOrder=$rServiceCompanyOrder;
    }
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {

    }


    public function orderNotification(){

        $oResults= $this->rOrder->getByFilter(['notification'=>0]);

        return $oResults;
    }

    public function restaurantNotification(){
        $oRestaurant= $this->rRestaurant->getByFilter(['notification'=>0]);

        return $oRestaurant;
    }




    public function restaurantRateNotification(){
        $oRestaurantRate= $this->rRestaurantRate->getByFilter(['notification'=>0]);

        return $oRestaurantRate;
    }


    public function dishRateNotification(){
        $oDishRate= $this->rDishRate->getByFilter(['notification'=>0]);
        return $oDishRate;
    }


    public function paymentNotification(){
        $oResults= $this->rPayment->getByFilter(['notification'=>0]);
        return $oResults;
    }
    public function orderDriverNotification(){
        $oResults= $this->rOrderDriver->getByFilter(['notification'=>0]);
        return $oResults;
    }
    public function cartNotification(){
        $oResults= $this->rCart->getByFilter([]);
        return $oResults;
    }

    public function serviceCompanyOrderNotification(){
        $oResults= $this->rServiceCompanyOrder->getByFilter(['notification'=>0]);

        return $oResults;
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


}


