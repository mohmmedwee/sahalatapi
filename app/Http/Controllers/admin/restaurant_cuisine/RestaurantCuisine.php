<?php

namespace App\Http\Controllers\admin\restaurant_cuisine;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use App\Http\Requests\admin\restaurant_cuisine\createRequest;
use App\Http\Requests\admin\restaurant_cuisine\editRequest;
use Session;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;


use App\Models\RestaurantCuisine as mRestaurantCuisine;
use App\Repositories\admin\restaurant_cuisine\RestaurantCuisineContract as rRestaurantCuisine;

 use App\Repositories\admin\restaurant\RestaurantContract as rRestaurant;
 use App\Repositories\admin\cuisine\CuisineContract as rCuisine;

class RestaurantCuisine extends Controller
{
    private $rRestaurantCuisine;

    public function __construct(rRestaurantCuisine $rRestaurantCuisine)
    {
        $this->rRestaurantCuisine=$rRestaurantCuisine;
    }
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index(Request $request)
    {       
        $this->rRestaurantCuisine->exportRestaurantcuisine($request);



        $oResults=$this->rRestaurantCuisine->getByFilter($request);
$restaurant_ids = array();
         $names = array();       
        foreach ($oResults as $oResult)
        {

            if(array_key_exists($oResult->restaurant->name_en, $restaurant_ids))
            {
               
                $restaurant_ids[$oResult->restaurant->name_en] =   $restaurant_ids[$oResult->restaurant->name_en].' , '.$oResult->cuisine->name_en;
            }
            else 
            {
                $restaurant_ids[$oResult->restaurant->name_en] =   $oResult->cuisine->name_en;
                $names[$oResult->id] =$oResult->restaurant->name_en;
            }
            
        }

        
 
        return view('admin.restaurant_cuisine.index', compact('oResults','request','restaurant_ids','names'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return view
     */
    public function create(Request $request,rRestaurant $rRestaurant,rCuisine $rCuisine)
    {

$restaurantList=$rRestaurant->getAllList();
$cuisineList=$rCuisine->getAllList();

        return view('admin.restaurant_cuisine.create',compact('request','restaurantList','cuisineList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return redirect
     */
    public function store(createRequest $request)
    {


        $oResults=$this->rRestaurantCuisine->create($request->all());

        return redirect('admin/restaurant_cuisine');
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


        $restaurant_cuisine=$this->rRestaurantCuisine->show($id);
      $request->merge(['restaurant_cuisine_id'=>$id,'page_name'=>'page']);



        return view('admin.restaurant_cuisine.show', compact('restaurant_cuisine','request'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return view
     */
    public function edit($id,rRestaurant $rRestaurant,rCuisine $rCuisine)
    {


        $restaurant_cuisine=$this->rRestaurantCuisine->show($id);


 $restaurantList=$rRestaurant->getAllList();
 $cuisineList=$rCuisine->getAllList();
        return view('admin.restaurant_cuisine.edit', compact('restaurant_cuisine','restaurantList','cuisineList'));
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

        $result=$this->rRestaurantCuisine->update($id,$request);

        return redirect('admin/restaurant_cuisine');
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
        $restaurant_cuisine=$this->rRestaurantCuisine->destroy($id);
        return redirect('admin/restaurant_cuisine');
    }





































}
