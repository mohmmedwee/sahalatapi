<?php

namespace App\Http\Controllers\admin\category;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use App\Http\Requests\admin\category\createRequest;
use App\Http\Requests\admin\category\editRequest;
use Session;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;


use App\Models\Category as mCategory;
use App\Repositories\admin\category\CategoryContract as rCategory;

 use App\Repositories\admin\restaurant\RestaurantContract as rRestaurant;
 use App\Repositories\admin\dish\DishContract as rDish;

class Category extends Controller
{
    private $rCategory;

    public function __construct(rCategory $rCategory)
    {
        $this->rCategory=$rCategory;
    }
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index(Request $request)
    {


        $oResults=$this->rCategory->getByFilter($request);

        return view('admin.category.index', compact('oResults','request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return view
     */
    public function create(Request $request,rRestaurant $rRestaurant)
    {

$restaurantList=$rRestaurant->getAllList();

        return view('admin.category.create',compact('request','restaurantList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return redirect
     */
    public function store(createRequest $request)
    {


        $oResults=$this->rCategory->create($request->all());

        return redirect('admin/category');
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


        $category=$this->rCategory->show($id);
      $request->merge(['category_id'=>$id,'page_name'=>'page']);


    $request->page_name='page_dish';
    $oDishResults=$rDish->getByFilter($request);

        return view('admin.category.show', compact('category','request','oDishResults'));
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


        $category=$this->rCategory->show($id);


 $restaurantList=$rRestaurant->getAllList();
        return view('admin.category.edit', compact('category','restaurantList'));
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

        $result=$this->rCategory->update($id,$request);

        return redirect('admin/category');
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
        $category=$this->rCategory->destroy($id);
        return redirect('admin/category');
    }


}
