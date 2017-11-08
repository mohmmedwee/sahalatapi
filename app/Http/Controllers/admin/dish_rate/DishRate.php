<?php

namespace App\Http\Controllers\admin\dish_rate;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use App\Http\Requests\admin\dish_rate\createRequest;
use App\Http\Requests\admin\dish_rate\editRequest;
use Session;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;


use App\Models\DishRate as mDishRate;
use App\Repositories\admin\dish_rate\DishRateContract as rDishRate;

 use App\Repositories\admin\users\UsersContract as rUsers;
use App\Repositories\admin\restaurant\RestaurantContract as rRestaurant;
use App\Repositories\admin\dish\DishContract as rDish;

class DishRate extends Controller
{
    private $rDishRate;

    public function __construct(rDishRate $rDishRate)
    {
        $this->rDishRate=$rDishRate;
    }
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index(Request $request)
    {


        $oResults=$this->rDishRate->getByFilter($request);

        return view('admin.dish_rate.index', compact('oResults','request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return view
     */
    public function create(Request $request,rUsers $rUsers,rRestaurant $rRestaurant,rDish $rDish)
    {

$usersList=$rUsers->getAllList();
$restaurantList=$rRestaurant->getAllList();

        $dishList=$rDish->getAllList();
        return view('admin.dish_rate.create',compact('request','usersList','restaurantList','dishList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return redirect
     */
    public function store(createRequest $request)
    {


        $oResults=$this->rDishRate->create($request->all());

        return Redirect::back();
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


        $dish_rate=$this->rDishRate->show($id);
      $request->merge(['dish_rate_id'=>$id,'page_name'=>'page']);



        return view('admin.dish_rate.show', compact('dish_rate','request'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return view
     */
    public function edit($id,rUsers $rUsers,rRestaurant $rRestaurant,rDish $rDish)
    {


        $dish_rate=$this->rDishRate->show($id);


 $usersList=$rUsers->getAllList();
        $restaurantList=$rRestaurant->getAllList();
        $dishList=$rDish->getAllList();
        return view('admin.dish_rate.edit', compact('dish_rate','usersList','restaurantList','dishList'));
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

        $result=$this->rDishRate->update($id,$request);

        return Redirect::back();
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
        $dish_rate=$this->rDishRate->destroy($id);
        return redirect('admin/dish_rate');
    }


}
