<?php

namespace App\Http\Controllers\admin\area;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use App\Http\Requests\admin\area\createRequest;
use App\Http\Requests\admin\area\editRequest;
use Session;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;


use App\Models\Area as mArea;
use App\Repositories\admin\area\AreaContract as rArea;

 use App\Repositories\admin\governorate\GovernorateContract as rGovernorate;
 use App\Repositories\admin\restaurant\RestaurantContract as rRestaurant;
 use App\Repositories\admin\restaurant_area\RestaurantAreaContract as rRestaurantArea;
 use App\Repositories\admin\address\AddressContract as rAddress;

class Area extends Controller
{
    private $rArea;

    public function __construct(rArea $rArea)
    {
        $this->rArea=$rArea;
    }
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index(Request $request)
    {


        $oResults=$this->rArea->getByFilter($request);

        return view('admin.area.index', compact('oResults','request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return view
     */
    public function create(Request $request,rGovernorate $rGovernorate)
    {

$governorateList=$rGovernorate->getAllList();

        return view('admin.area.create',compact('request','governorateList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return redirect
     */
    public function store(createRequest $request)
    {


        $oResults=$this->rArea->create($request->all());

        return redirect('admin/area');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return view
     */
    public function show($id,Request $request,rRestaurant $rRestaurant,rRestaurantArea $rRestaurantArea,rAddress $rAddress)
    {


        $area=$this->rArea->show($id);
      $request->merge(['area_id'=>$id,'page_name'=>'page']);


    $request->page_name='page_restaurant';
    $oRestaurantResults=$rRestaurant->getByFilter($request);
    $request->page_name='page_restaurant_area';
    $oRestaurantAreaResults=$rRestaurantArea->getByFilter($request);
    $request->page_name='page_address';
    $oAddressResults=$rAddress->getByFilter($request);

        return view('admin.area.show', compact('area','request','oRestaurantResults','oRestaurantAreaResults','oAddressResults'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return view
     */
    public function edit($id,rGovernorate $rGovernorate)
    {


        $area=$this->rArea->show($id);


 $governorateList=$rGovernorate->getAllList();
        return view('admin.area.edit', compact('area','governorateList'));
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

        $result=$this->rArea->update($id,$request);

        return redirect('admin/area');
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
        $area=$this->rArea->destroy($id);
        return redirect('admin/area');
    }


}
