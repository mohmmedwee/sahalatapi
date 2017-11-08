<?php

namespace App\Http\Controllers\admin\cuisine;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use App\Http\Requests\admin\cuisine\createRequest;
use App\Http\Requests\admin\cuisine\editRequest;
use Session;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;


use App\Models\Cuisine as mCuisine;
use App\Repositories\admin\cuisine\CuisineContract as rCuisine;

 use App\Repositories\admin\restaurant_cuisine\RestaurantCuisineContract as rRestaurantCuisine;
 use App\Repositories\admin\dish\DishContract as rDish;

class Cuisine extends Controller
{
    private $rCuisine;

    public function __construct(rCuisine $rCuisine)
    {
        $this->rCuisine=$rCuisine;
    }
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index(Request $request)
    {

    $this->rCuisine->exportBestCuisine($request);
        $oResults=$this->rCuisine->getByFilter($request);

        return view('admin.cuisine.index', compact('oResults','request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return view
     */
    public function create(Request $request)
    {


        return view('admin.cuisine.create',compact('request'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return redirect
     */
    public function store(createRequest $request)
    {


        $oResults=$this->rCuisine->create($request->all());

        return redirect('admin/cuisine');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return view
     */
    public function show($id,Request $request,rRestaurantCuisine $rRestaurantCuisine,rDish $rDish)
    {


        $cuisine=$this->rCuisine->show($id);
      $request->merge(['cuisine_id'=>$id,'page_name'=>'page']);


    $request->page_name='page_restaurant_cuisine';
    $oRestaurantCuisineResults=$rRestaurantCuisine->getByFilter($request);
    $request->page_name='page_dish';
    $oDishResults=$rDish->getByFilter($request);

        return view('admin.cuisine.show', compact('cuisine','request','oRestaurantCuisineResults','oDishResults'));
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


        $cuisine=$this->rCuisine->show($id);


        return view('admin.cuisine.edit', compact('cuisine'));
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

        $result=$this->rCuisine->update($id,$request);

        return redirect('admin/cuisine');
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
        $cuisine=$this->rCuisine->destroy($id);
        return redirect('admin/cuisine');
    }


}
