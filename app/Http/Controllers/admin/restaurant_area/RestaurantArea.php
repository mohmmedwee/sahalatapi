<?php

namespace App\Http\Controllers\admin\restaurant_area;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use App\Http\Requests\admin\restaurant_area\createRequest;
use App\Http\Requests\admin\restaurant_area\editRequest;
use Session;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;


use App\Models\RestaurantArea as mRestaurantArea;
use App\Repositories\admin\restaurant_area\RestaurantAreaContract as rRestaurantArea;

 use App\Repositories\admin\area\AreaContract as rArea;
 use App\Repositories\admin\restaurant\RestaurantContract as rRestaurant;
 use App\Repositories\admin\governorate\GovernorateContract as rGovernorate;
 use App\Repositories\admin\operation_hour\OperationHourContract as rOperationHour;

class RestaurantArea extends Controller
{
    private $rRestaurantArea;

    public function __construct(rRestaurantArea $rRestaurantArea)
    {
        $this->rRestaurantArea=$rRestaurantArea;
    }
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index(Request $request)
    {
       $this->rRestaurantArea->exportAreaResturant($request);

        $oResults=$this->rRestaurantArea->getByFilter($request);

        return view('admin.restaurant_area.index', compact('oResults','request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return view
     */
    public function create(Request $request,rArea $rArea,rRestaurant $rRestaurant,rGovernorate $rGovernorate)
    {

$areaList=$rArea->getAllList();
$restaurantList=$rRestaurant->getAllList();
$governorateList=$rGovernorate->getAllList();

        return view('admin.restaurant_area.create',compact('request','areaList','restaurantList','governorateList'));
    }
    /*List all areas in restaurant area*/
        public function area(Request $request , rArea $rArea)
    {
        
       $areaList=$rArea->getAllListwithid(array('governorate_id' => $request->governrate_id));
        
       return ($areaList);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return redirect
     */
    public function store(createRequest $request)
    {


        $oResults=$this->rRestaurantArea->create($request->all());

        return redirect('admin/restaurant_area');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return view
     */
    public function show($id,Request $request,rOperationHour $rOperationHour)
    {


        $restaurant_area=$this->rRestaurantArea->show($id);
      $request->merge(['restaurant_area_id'=>$id,'page_name'=>'page']);


    $request->page_name='page_operation_hour';
    $oOperationHourResults=$rOperationHour->getByFilter($request);

        return view('admin.restaurant_area.show', compact('restaurant_area','request','oOperationHourResults'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return view
     */
    public function edit($id,rArea $rArea,rRestaurant $rRestaurant,rGovernorate $rGovernorate)
    {


        $restaurant_area=$this->rRestaurantArea->show($id);


 $areaList=$rArea->getAllList();
 $restaurantList=$rRestaurant->getAllList();
 $governorateList=$rGovernorate->getAllList();
        return view('admin.restaurant_area.edit', compact('restaurant_area','areaList','restaurantList','governorateList'));
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

        $result=$this->rRestaurantArea->update($id,$request);

        return redirect('admin/restaurant_area');
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
        $restaurant_area=$this->rRestaurantArea->destroy($id);
        return redirect('admin/restaurant_area');
    }


}
