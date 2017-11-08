<?php

namespace App\Http\Controllers\admin\restaurant_users;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use App\Http\Requests\admin\restaurant_users\createRequest;
use App\Http\Requests\admin\restaurant_users\editRequest;
use Session;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;


use App\Models\RestaurantUsers as mRestaurantUsers;
use App\Repositories\admin\restaurant_users\RestaurantUsersContract as rRestaurantUsers;

 use App\Repositories\admin\users\UsersContract as rUsers;
 use App\Repositories\admin\restaurant\RestaurantContract as rRestaurant;

class RestaurantUsers extends Controller
{
    private $rRestaurantUsers;

    public function __construct(rRestaurantUsers $rRestaurantUsers)
    {
        $this->rRestaurantUsers=$rRestaurantUsers;
    }
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index(Request $request)
    {


        $oResults=$this->rRestaurantUsers->getByFilter($request);

        return view('admin.restaurant_users.index', compact('oResults','request'));
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

        return view('admin.restaurant_users.create',compact('request','usersList','restaurantList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return redirect
     */
    public function store(createRequest $request)
    {


        $oResults=$this->rRestaurantUsers->create($request->all());

        return redirect('admin/restaurant_users');
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


        $restaurant_users=$this->rRestaurantUsers->show($id);
      $request->merge(['restaurant_users_id'=>$id,'page_name'=>'page']);



        return view('admin.restaurant_users.show', compact('restaurant_users','request'));
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


        $restaurant_users=$this->rRestaurantUsers->show($id);


 $usersList=$rUsers->getAllList();
 $restaurantList=$rRestaurant->getAllList();
        return view('admin.restaurant_users.edit', compact('restaurant_users','usersList','restaurantList'));
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

        $result=$this->rRestaurantUsers->update($id,$request);

        return redirect('admin/restaurant_users');
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
        $restaurant_users=$this->rRestaurantUsers->destroy($id);
        return redirect('admin/restaurant_users');
    }


}
