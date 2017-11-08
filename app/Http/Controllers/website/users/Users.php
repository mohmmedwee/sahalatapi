<?php

namespace App\Http\Controllers\website\users;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use Session;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

use Illuminate\Http\JsonResponse;

use App\Http\Requests\website\users\createRequest;
use App\Http\Requests\website\users\editRequest;

use App\Repositories\website\users\UsersContract as rUsers;
use App\Repositories\website\area\AreaContract as rArea;
use App\Repositories\website\address\AddressContract as rAddress;
use App\Repositories\website\order\OrderContract as rOrder;


use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

class Users extends Controller
{


    public function __construct()
    {
    }


    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index(Request $request, rUsers $rUsers, rAddress $rAddress, rOrder $rOrder, rArea $rArea)
    {
        $oUsers = $rUsers->show(current_user()->getUser()->id);
        $request->merge(['users_id' => current_user()->getUser()->id]);


        $oAddress = [];
        if (isset($request->selected_address_id)) {
            $oAddress = $rAddress->show($request->selected_address_id);
        }


        $oAddressResults = $rAddress->getByFilter($request->all());
        $oOrderResults = $rOrder->getByFilter($request->all());

        $areaList = $rArea->getAllList($request);
        return view('website.users.account',
            compact('request', 'oUsers', 'oAddressResults', 'oOrderResults', 'oAddress', 'areaList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create(Request $request, rArea $rArea)
    {
        
        $areaList = $rArea->getAllList();
        
        return view('website.users.create', compact('request', 'areaList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(createRequest $request, rUsers $rUsers, rAddress $rAddress ,rOrder $rOrder)
    {

            if($request->password == ''){
                $tempRequest=$request->except(['password']);
            }else{
                $request->merge(['password'=>password_hash($request->password,PASSWORD_DEFAULT)]);
                $tempRequest=$request;
            }


        $user = Sentinel::registerAndActivate($request->all());
        $rUsers->update($user->id, $request,$tempRequest);
        $request->merge(['users_id' => $user->id]);
        $request->mobile = $request->address_mobile;
        $request->phone = $request->address_phone;
        $oResults = $rAddress->create($request->all());

        Sentinel::login($user);

         if(isset($request->order_id)){
            $rOrder->update($request->order_id,['users_id'=>$user->id]);
            //return Redirect::to( '/order?order_id='.$request->order_id);
        }


        if ($request->ajax()) {
            return new JsonResponse(['status' => 'success', 'redirect' => route('users.index')], 200);
        } else {
            return redirect(route('users.index'));
        }






        
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return void
     */
    public function show($id)
    {


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return void
     */
    public function edit($id)
    {


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     *
     * @return void
     */
    public function update($id, editRequest $request, rUsers $rUsers)
    {
        $id = current_user()->getUser()->id;
        $result = $rUsers->update($id, $request);

        if ($request->ajax()) {
            return new JsonResponse(['status' => 'success'], 200);
        } else {
            return redirect('/users');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return void
     */
    public function destroy($id)
    {

    }


}
