<?php

namespace App\Http\Controllers\admin\delivery_menu;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use App\Http\Requests\admin\delivery_menu\createRequest;
use App\Http\Requests\admin\delivery_menu\editRequest;
use Session;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;


use App\Models\DeliveryMenu as mDeliveryMenu;
use App\Repositories\admin\delivery_menu\DeliveryMenuContract as rDeliveryMenu;

 use App\Repositories\admin\restaurant\RestaurantContract as rRestaurant;
 use App\Repositories\admin\dish\DishContract as rDish;

class DeliveryMenu extends Controller
{
    private $rDeliveryMenu;

    public function __construct(rDeliveryMenu $rDeliveryMenu)
    {
        $this->rDeliveryMenu=$rDeliveryMenu;
    }
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index(Request $request)
    {


        $oResults=$this->rDeliveryMenu->getByFilter($request);

        return view('admin.delivery_menu.index', compact('oResults','request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return view
     */
    public function create(Request $request,rRestaurant $rRestaurant)
    {

$restaurantList=$rRestaurant->getAllList();

        return view('admin.delivery_menu.create',compact('request','restaurantList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return redirect
     */
    public function store(createRequest $request)
    {


        $oResults=$this->rDeliveryMenu->create($request->all());

        return redirect('admin/delivery_menu');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return view
     */
    public function show($id,Request $request,rDish $rDish)
    {


        $delivery_menu=$this->rDeliveryMenu->show($id);
      $request->merge(['delivery_menu_id'=>$id,'page_name'=>'page']);


    $request->page_name='page_dish';
    $oDishResults=$rDish->getByFilter($request);

        return view('admin.delivery_menu.show', compact('delivery_menu','request','oDishResults'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return view
     */
    public function edit($id,rRestaurant $rRestaurant)
    {


        $delivery_menu=$this->rDeliveryMenu->show($id);


 $restaurantList=$rRestaurant->getAllList();
        return view('admin.delivery_menu.edit', compact('delivery_menu','restaurantList'));
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

        $result=$this->rDeliveryMenu->update($id,$request);

        return redirect('admin/delivery_menu');
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
        $delivery_menu=$this->rDeliveryMenu->destroy($id);
        return redirect('admin/delivery_menu');
    }


}
