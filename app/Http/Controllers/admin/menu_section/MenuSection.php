<?php

namespace App\Http\Controllers\admin\menu_section;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use App\Http\Requests\admin\menu_section\createRequest;
use App\Http\Requests\admin\menu_section\editRequest;
use Session;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;


use App\Models\MenuSection as mMenuSection;
use App\Repositories\admin\menu_section\MenuSectionContract as rMenuSection;

 use App\Repositories\admin\restaurant\RestaurantContract as rRestaurant;
 use App\Repositories\admin\dish\DishContract as rDish;

class MenuSection extends Controller
{
    private $rMenuSection;

    public function __construct(rMenuSection $rMenuSection)
    {
        $this->rMenuSection=$rMenuSection;
    }
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index(Request $request)
    {


        $oResults=$this->rMenuSection->getByFilter($request);

        return view('admin.menu_section.index', compact('oResults','request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return view
     */
    public function create(Request $request,rRestaurant $rRestaurant)
    {

$restaurantList=$rRestaurant->getAllList();

        return view('admin.menu_section.create',compact('request','restaurantList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return redirect
     */
    public function store(createRequest $request)
    {


        $oResults=$this->rMenuSection->create($request->all());

        return redirect('admin/menu_section');
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


        $menu_section=$this->rMenuSection->show($id);
      $request->merge(['menu_section_id'=>$id,'page_name'=>'page']);


    $request->page_name='page_dish';
    $oDishResults=$rDish->getByFilter($request);

        return view('admin.menu_section.show', compact('menu_section','request','oDishResults'));
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


        $menu_section=$this->rMenuSection->show($id);


 $restaurantList=$rRestaurant->getAllList();
        return view('admin.menu_section.edit', compact('menu_section','restaurantList'));
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

        $result=$this->rMenuSection->update($id,$request);

        return redirect('admin/menu_section');
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
        $menu_section=$this->rMenuSection->destroy($id);
        return redirect('admin/menu_section');
    }


}
