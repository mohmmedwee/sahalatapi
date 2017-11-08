<?php

namespace App\Http\Controllers\admin\cart;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use App\Http\Requests\admin\cart\createRequest;
use App\Http\Requests\admin\cart\editRequest;
use Session;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;


use App\Models\Cart as mCart;
use App\Repositories\admin\cart\CartContract as rCart;

 use App\Repositories\admin\users\UsersContract as rUsers;
 use App\Repositories\admin\restaurant\RestaurantContract as rRestaurant;
 use App\Repositories\admin\dish\DishContract as rDish;
 use App\Repositories\admin\order\OrderContract as rOrder;

class Cart extends Controller
{
    private $rCart;

    public function __construct(rCart $rCart)
    {
        $this->rCart=$rCart;
    }
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index(Request $request)
    {


        $oResults=$this->rCart->getByFilter($request);

        return view('admin.cart.index', compact('oResults','request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return view
     */
    public function create(Request $request,rUsers $rUsers,rRestaurant $rRestaurant,rDish $rDish,rOrder $rOrder)
    {

$usersList=$rUsers->getAllList();
$restaurantList=$rRestaurant->getAllList();
$dishList=$rDish->getAllList();
$orderList=$rOrder->getAllList();

        return view('admin.cart.create',compact('request','usersList','restaurantList','dishList','orderList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return redirect
     */
    public function store(createRequest $request)
    {


        $oResults=$this->rCart->create($request->all());

        return redirect('admin/cart');
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


        $cart=$this->rCart->show($id);
      $request->merge(['cart_id'=>$id,'page_name'=>'page']);



        return view('admin.cart.show', compact('cart','request'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return view
     */
    public function edit($id,rUsers $rUsers,rRestaurant $rRestaurant,rDish $rDish,rOrder $rOrder)
    {


        $cart=$this->rCart->show($id);


 $usersList=$rUsers->getAllList();
 $restaurantList=$rRestaurant->getAllList();
 $dishList=$rDish->getAllList();
 $orderList=$rOrder->getAllList();
        return view('admin.cart.edit', compact('cart','usersList','restaurantList','dishList','orderList'));
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

        $result=$this->rCart->update($id,$request);

        return redirect('admin/cart');
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
        $cart=$this->rCart->destroy($id);
        return redirect('admin/cart');
    }


}
