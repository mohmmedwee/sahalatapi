<?php

namespace App\Http\Controllers\website\restaurant;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use Session;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

use App\Http\Requests\website\restaurant\createRequest;

use App\Repositories\website\restaurant\RestaurantContract as rRestaurant;

use App\Repositories\website\menu_section\MenuSectionContract as rMenu;
use App\Repositories\website\dish\DishContract as rDish;
use App\Repositories\website\order\OrderContract as rOrder;

class Restaurant extends Controller
{

    public function __construct()
    {
    }
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index(Request $request,rRestaurant $rRestaurant)
    {
         
        $request->merge(['getAllRecords'=>1]);
        $oResults=$rRestaurant->getByFilter($request);
         // dd($oResults);
return view('website.restaurant.index',compact('request','oResults'));
    }



    public  function getMenuItem(Request $request,rRestaurant $rRestaurant,rDish $rDish,rOrder $rOrder)
    {



        $request->merge(['getAllRecords'=>1]);
        $oResults=$rDish->getByFilter($request);
$oRestaurant=$rRestaurant->show($request->restaurant_id);

        $oOrderResults=[];
if(isset(current_user()->getUser()->id)) {
    $request->merge(['users_id' => current_user()->getUser()->id, 'restaurant_id' => $request->restaurant_id, 'status' => config('array.order_status_pending_index')]);
    $oOrderResults = $rOrder->getByFilter($request->except('id'));
}
        return view('website.restaurant.menuItem',compact('request','oResults','oRestaurant','oOrderResults'));

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create(Request $request)
    {

        return view('website.restaurant.create',compact('request'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(createRequest $request,rRestaurant $rRestaurant)
    {


        $oResults=$rRestaurant->create($request->all());
        $oResults=$this->rRestaurant->create($request->all());

        if(isset($request->branch) && $request->branch > 0 && $oResults){
            $mainBranchId=$request->branch;
            $newBranchId=$oResults->id;
                

        }
        return view('website.restaurant.thank',compact('request'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function show($id,Request $request,rRestaurant $rRestaurant , rMenu $rMenu)
    {
        
        $restaurant=$rRestaurant->show($id);

        $MenuSection=$rMenu->getMenuSection($id);



        $restaurantAreaList=[];

        $selected_area_id=(isset($request->selected_area_id))? $request->selected_area_id:0;
$selected_area=[];
        if(isset($restaurant->restaurant_area) && count($restaurant->restaurant_area)){

            foreach($restaurant->restaurant_area as $restaurant_area){
                if($selected_area_id ==0 || $selected_area_id==$restaurant_area->area_id){
                    $selected_area_id=$restaurant_area->area_id;
                    $selected_area=$restaurant_area;
                }
                $restaurantAreaList[$restaurant_area->area_id]=$restaurant_area->area->{'name_'.config('app.locale')};
            }

        }else{
            $restaurantAreaList[$restaurant->area_id]=isset($restaurant->area->{'name_'.config('app.locale')})?$restaurant->area->{'name_'.config('app.locale')}:'' ;

        }



        $mostSellingDishes=$rRestaurant->getMostSellingDishes($restaurant->id);


        return view('website.restaurant.show',compact('request','restaurant','restaurantAreaList','selected_area','mostSellingDishes','MenuSection'));




    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function edit(Request $request,rRestaurant $rRestaurant)
    {
        $request->merge(['getAllRecords'=>1]);
        $oResults=$rRestaurant->getByFilter($request);
         // dd($oResults);
return view('website.restaurant.index',compact('request','oResults'));

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
