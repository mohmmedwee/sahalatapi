<?php

namespace App\Http\Controllers\admin\restaurant_rate;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use App\Http\Requests\admin\restaurant_rate\createRequest;
use App\Http\Requests\admin\restaurant_rate\editRequest;
use Session;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;


use App\Models\RestaurantRate as mRestaurantRate;
use App\Repositories\admin\restaurant_rate\RestaurantRateContract as rRestaurantRate;

 use App\Repositories\admin\users\UsersContract as rUsers;
 use App\Repositories\admin\restaurant\RestaurantContract as rRestaurant;

class RestaurantRate extends Controller
{
    private $rRestaurantRate;

    public function __construct(rRestaurantRate $rRestaurantRate)
    {
        $this->rRestaurantRate=$rRestaurantRate;
    }
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index(Request $request,rUsers $rUsers,rRestaurant $rRestaurant)
    {
               $this->rRestaurantRate->exportAreaResturant($request);

        $usersList=$rUsers->getAllList();
        $restaurantList=$rRestaurant->getAllList();

        $oResults=$this->rRestaurantRate->getByFilter($request);

        return view('admin.restaurant_rate.index', compact('oResults','request','restaurantList','usersList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return view
     */
    public function create(Request $request,rUsers $rUsers,rRestaurant $rRestaurant)
    {

$usersList=$rUsers->getAllList();
$restaurantList=$rRestaurant->getAllList();

        return view('admin.restaurant_rate.create',compact('request','usersList','restaurantList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return redirect
     */
    public function store(createRequest $request)
    {


        $oResults=$this->rRestaurantRate->create($request->all());

        return redirect('admin/restaurant_rate');
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


        $restaurant_rate=$this->rRestaurantRate->show($id);
      $request->merge(['restaurant_rate_id'=>$id,'page_name'=>'page']);



        return view('admin.restaurant_rate.show', compact('restaurant_rate','request'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return view
     */
    public function edit($id,rUsers $rUsers,rRestaurant $rRestaurant)
    {


        $restaurant_rate=$this->rRestaurantRate->show($id);


 $usersList=$rUsers->getAllList();
 $restaurantList=$rRestaurant->getAllList();
        return view('admin.restaurant_rate.edit', compact('restaurant_rate','usersList','restaurantList'));
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

        $result=$this->rRestaurantRate->update($id,$request);

        return redirect('admin/restaurant_rate');
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
        $restaurant_rate=$this->rRestaurantRate->destroy($id);
        return redirect('admin/restaurant_rate');
    }


}
