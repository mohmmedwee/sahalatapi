<?php

namespace App\Http\Controllers\admin\order_driver;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use App\Http\Requests\admin\order_driver\createRequest;
use App\Http\Requests\admin\order_driver\editRequest;
use Session;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;


use App\Models\Order as mOrder;
use App\Models\OrderDriver as mOrderDriver;
use App\Repositories\admin\order_driver\OrderDriverContract as rOrderDriver;
use App\Repositories\admin\restaurant_users\RestaurantUsersContract as rRestaurantUsers;
use App\Repositories\admin\restaurant\RestaurantContract as rRestaurant;
use App\Repositories\admin\area\AreaContract as rArea;

use App\Repositories\admin\service_boy\ServiceBoyContract as rServiceBoy;

use App\Repositories\admin\users\UsersContract as rUsers;
use App\Repositories\admin\order\OrderContract as rOrder;

class Chart extends Controller
{
    private $rOrderDriver;
    private $rOrder;

    public function __construct(rOrderDriver $rOrderDriver,rOrder $rOrder)
    {
        $this->rOrderDriver = $rOrderDriver;
        $this->rOrder = $rOrder;
    }

    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function getBarChart(Request $request)
    {

        $oChartData=[];
        $chartName=isset($request->chartName)? $request->chartName:'successDeliverTaskChart';
        if($chartName =='successDeliverTaskChart'){
            $oChartData= $this->rOrderDriver->successDeliverTaskChart($request);

        } else if($chartName =='unsuccessDeliverTaskChart'){
            $oChartData= $this->rOrderDriver->unsuccessDeliverTaskChart($request);

        } else if($chartName =='successDistanceDeliverTaskChart'){
            $oChartData= $this->rOrderDriver->successDistanceDeliverTaskChart($request);

        } else if($chartName =='unsuccessDistanceDeliverTaskChart'){
            $oChartData= $this->rOrderDriver->unsuccessDistanceDeliverTaskChart($request);

        } else if($chartName =='successTimeDeliverTaskChart'){
            $oChartData= $this->rOrderDriver->successTimeDeliverTaskChart($request);

        } else if($chartName =='unsuccessTimeDeliverTaskChart'){
            $oChartData= $this->rOrderDriver->unsuccessTimeDeliverTaskChart($request);

        } else if($chartName =='distanceWithReturnChart'){
            $oChartData= $this->rOrderDriver->distanceWithReturnChart($request);

        }else if($chartName =='timeWithReturnChart' ){
            $oChartData= $this->rOrderDriver->timeWithReturnChart($request);

        }else if($chartName =='totalDutyTime'){
            $oChartData= $this->rOrderDriver->totalDutyTime($request);

        }



$driverList= $this->rOrderDriver-> getDrivers();

        return view('admin.order_driver.chart', compact('oChartData','request','driverList'));
    }


    public function getPieChart(Request $request)
    {


        $driverList= $this->rOrderDriver-> getDrivers();

            $oChartData= $this->rOrder->areaOrderChart($request);




        return view('admin.order_driver.pieChart', compact('oChartData','request','driverList'));
    }



    public function getAttendChart(Request $request)
    {

        if(!isset($request->from_date)){$request->merge(['from_date'=>gmdate('Y-m-d')]);}

        $request->merge(['to_date'=>gmdate('Y-m-d')]);

        $driverList= $this->rOrderDriver-> getDrivers();

        $oChartData= $this->rOrderDriver->driverAttendChart($request);




        return view('admin.order_driver.attendChart', compact('oChartData','request','driverList'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return view
     */
    public function create(Request $request, rUsers $rUsers, rOrder $rOrder, rRestaurantUsers $rRestaurantUsers){

    }

    /**
     * Store a newly created resource in storage.
     *
     * @return redirect
     */
    public function store(createRequest $request){}

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return view
     */
    public function show($id, Request $request){}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return view
     */
    public function edit($id, rUsers $rUsers, rOrder $rOrder){}

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     *
     * @return redirect
     */
    public function update($id, editRequest $request)
    {


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return redirect
     */
    public function destroy($id)
    {
    }


}
