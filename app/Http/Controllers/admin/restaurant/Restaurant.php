<?php

namespace App\Http\Controllers\admin\restaurant;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use App\Http\Requests\admin\restaurant\createRequest;
use App\Http\Requests\admin\restaurant\editRequest;
use Session;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;


use App\Models\Restaurant as mRestaurant;
use App\Repositories\admin\restaurant\RestaurantContract as rRestaurant;

use App\Repositories\admin\area\AreaContract as rArea;
use App\Repositories\admin\category\CategoryContract as rCategory;
use App\Repositories\admin\delivery_menu\DeliveryMenuContract as rDeliveryMenu;
use App\Repositories\admin\restaurant_rate\RestaurantRateContract as rRestaurantRate;
use App\Repositories\admin\restaurant_cuisine\RestaurantCuisineContract as rRestaurantCuisine;
use App\Repositories\admin\menu_section\MenuSectionContract as rMenuSection;
use App\Repositories\admin\dish\DishContract as rDish;
use App\Repositories\admin\dish_rate\DishRateContract as rDishRate;
use App\Repositories\admin\restaurant_area\RestaurantAreaContract as rRestaurantArea;
use App\Repositories\admin\operation_hour\OperationHourContract as rOperationHour;
use App\Repositories\admin\cart\CartContract as rCart;
use App\Repositories\admin\restaurant_users\RestaurantUsersContract as rRestaurantUsers;

class Restaurant extends Controller
{
    private $rRestaurant;

    public function __construct(rRestaurant $rRestaurant)
    {
        $this->rRestaurant=$rRestaurant;
    }
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index(Request $request)
    {
     
        if(current_user()->getUser()==false)
        {
            return Redirect::route('client.auth.login')->withErrors([trans('user.InvalidLogin')]);
        }
       $this->rRestaurant->exportbestRestaurant($request);
       
        $oResults=$this->rRestaurant->getByFilter($request);

        return view('admin.restaurant.index', compact('oResults','request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return view
     */
    public function create(Request $request,rArea $rArea)
    {

        $areaList=$rArea->getAllList();

        $mainBranchList=$this->rRestaurant->getAllList(['branch'=>0]);
        return view('admin.restaurant.create',compact('request','areaList','mainBranchList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return redirect
     */
    public function store(createRequest $request)
    {


        $oResults=$this->rRestaurant->create($request->all());

        return redirect('admin/restaurant');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return view
     */
    public function show($id,Request $request,rCategory $rCategory,rDeliveryMenu $rDeliveryMenu,rRestaurantRate $rRestaurantRate,rRestaurantCuisine $rRestaurantCuisine,rMenuSection $rMenuSection,rDish $rDish,rDishRate $rDishRate,rRestaurantArea $rRestaurantArea,rOperationHour $rOperationHour,rCart $rCart,rRestaurantUsers $rRestaurantUsers)
    {


        $restaurant=$this->rRestaurant->show($id);
        $request->merge(['restaurant_id'=>$id,'page_name'=>'page']);


        $request->page_name='page_category';
        $oCategoryResults=$rCategory->getByFilter($request);
        $request->page_name='page_delivery_menu';
        $oDeliveryMenuResults=$rDeliveryMenu->getByFilter($request);
        $request->page_name='page_restaurant_rate';
        $oRestaurantRateResults=$rRestaurantRate->getByFilter($request);
        $request->page_name='page_restaurant_cuisine';
        $oRestaurantCuisineResults=$rRestaurantCuisine->getByFilter($request);
        $request->page_name='page_menu_section';
        $oMenuSectionResults=$rMenuSection->getByFilter($request);
        $request->page_name='page_dish';
        $oDishResults=$rDish->getByFilter($request);
        $request->page_name='page_dish_rate';
        $oDishRateResults=$rDishRate->getByFilter($request);
        $request->page_name='page_restaurant_area';
        $oRestaurantAreaResults=$rRestaurantArea->getByFilter($request);
        $request->page_name='page_operation_hour';
        $oOperationHourResults=$rOperationHour->getByFilter($request);
        $request->page_name='page_cart';
        $oCartResults=$rCart->getByFilter($request);
        $request->page_name='page_restaurant_users';
        $oRestaurantUsersResults=$rRestaurantUsers->getByFilter($request);

        return view('admin.restaurant.show', compact('restaurant','request','oCategoryResults','oDeliveryMenuResults','oRestaurantRateResults','oRestaurantCuisineResults','oMenuSectionResults','oDishResults','oDishRateResults','oRestaurantAreaResults','oOperationHourResults','oCartResults','oRestaurantUsersResults'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return view
     */
    public function edit($id,rArea $rArea)
    {


        $restaurant=$this->rRestaurant->show($id);


        $areaList=$rArea->getAllList();
        $mainBranchList=$this->rRestaurant->getAllList(['branch'=>0]);
        return view('admin.restaurant.edit', compact('restaurant','areaList','mainBranchList'));
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

        $result=$this->rRestaurant->update($id,$request);

        return redirect('admin/restaurant');
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
        $restaurant=$this->rRestaurant->destroy($id);
        return redirect('admin/restaurant');
    }


}
