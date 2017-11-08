<?php

namespace App\Http\Controllers\admin\governorate;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use App\Http\Requests\admin\governorate\createRequest;
use App\Http\Requests\admin\governorate\editRequest;
use Session;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;


use App\Models\Governorate as mGovernorate;
use App\Repositories\admin\governorate\GovernorateContract as rGovernorate;

 use App\Repositories\admin\area\AreaContract as rArea;
 use App\Repositories\admin\restaurant_area\RestaurantAreaContract as rRestaurantArea;

class Governorate extends Controller
{
    private $rGovernorate;

    public function __construct(rGovernorate $rGovernorate)
    {
        $this->rGovernorate=$rGovernorate;
    }
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index(Request $request)
    {


        $oResults=$this->rGovernorate->getByFilter($request);

        return view('admin.governorate.index', compact('oResults','request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return view
     */
    public function create(Request $request)
    {


        return view('admin.governorate.create',compact('request'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return redirect
     */
    public function store(createRequest $request)
    {


        $oResults=$this->rGovernorate->create($request->all());

        return redirect('admin/governorate');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return view
     */
    public function show($id,Request $request,rArea $rArea,rRestaurantArea $rRestaurantArea)
    {


        $governorate=$this->rGovernorate->show($id);
      $request->merge(['governorate_id'=>$id,'page_name'=>'page']);


    $request->page_name='page_area';
    $oAreaResults=$rArea->getByFilter($request);
    $request->page_name='page_restaurant_area';
    $oRestaurantAreaResults=$rRestaurantArea->getByFilter($request);

        return view('admin.governorate.show', compact('governorate','request','oAreaResults','oRestaurantAreaResults'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return view
     */
    public function edit($id)
    {


        $governorate=$this->rGovernorate->show($id);


        return view('admin.governorate.edit', compact('governorate'));
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

        $result=$this->rGovernorate->update($id,$request);

        return redirect('admin/governorate');
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
        $governorate=$this->rGovernorate->destroy($id);
        return redirect('admin/governorate');
    }


}
