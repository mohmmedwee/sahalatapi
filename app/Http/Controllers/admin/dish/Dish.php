<?php

namespace App\Http\Controllers\admin\dish;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use App\Http\Requests\admin\dish\createRequest;
use App\Http\Requests\admin\dish\editRequest;
use Session;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;


use App\Models\Dish as mDish;
use App\Repositories\admin\dish\DishContract as rDish;

 use App\Repositories\admin\restaurant\RestaurantContract as rRestaurant;
 use App\Repositories\admin\cuisine\CuisineContract as rCuisine;
 use App\Repositories\admin\menu_section\MenuSectionContract as rMenuSection;
 use App\Repositories\admin\category\CategoryContract as rCategory;
 use App\Repositories\admin\delivery_menu\DeliveryMenuContract as rDeliveryMenu;
 use App\Repositories\admin\cart\CartContract as rCart;

class Dish extends Controller
{
    private $rDish;

    public function __construct(rDish $rDish)
    {
        $this->rDish=$rDish;
    }
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index(Request $request)
    {

        $this->rDish->exportbestDish($request);

        $oResults=$this->rDish->getByFilter($request);

        return view('admin.dish.index', compact('oResults','request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return view
     */
    public function create(Request $request,rRestaurant $rRestaurant,rCuisine $rCuisine,rMenuSection $rMenuSection,rCategory $rCategory,rDeliveryMenu $rDeliveryMenu)
    {

$restaurantList=$rRestaurant->getAllList();
$cuisineList=$rCuisine->getAllList();
$menuSectionList=$rMenuSection->getAllList();
$categoryList=$rCategory->getAllList();
$deliveryMenuList=$rDeliveryMenu->getAllList();

        return view('admin.dish.create',compact('request','restaurantList','cuisineList','menuSectionList','categoryList','deliveryMenuList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return redirect
     */
    public function store(createRequest $request)
    {


        $oResults=$this->rDish->create($request->all());

        return redirect('admin/dish');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return view
     */
    public function show($id,Request $request,rCart $rCart)
    {


        $dish=$this->rDish->show($id);
      $request->merge(['dish_id'=>$id,'page_name'=>'page']);


    $request->page_name='page_cart';
    $oCartResults=$rCart->getByFilter($request);

        return view('admin.dish.show', compact('dish','request','oCartResults'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return view
     */
    public function edit($id,rRestaurant $rRestaurant,rCuisine $rCuisine,rMenuSection $rMenuSection,rCategory $rCategory,rDeliveryMenu $rDeliveryMenu)
    {


        $dish=$this->rDish->show($id);


 $restaurantList=$rRestaurant->getAllList();
 $cuisineList=$rCuisine->getAllList();
 $menuSectionList=$rMenuSection->getAllList();
 $categoryList=$rCategory->getAllList();
 $deliveryMenuList=$rDeliveryMenu->getAllList();
        return view('admin.dish.edit', compact('dish','restaurantList','cuisineList','menuSectionList','categoryList','deliveryMenuList'));
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

        $result=$this->rDish->update($id,$request);

        return redirect('admin/dish');
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
        $dish=$this->rDish->destroy($id);
        return redirect('admin/dish');
    }


}
