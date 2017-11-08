<?php

namespace App\Http\Controllers\website\restaurant;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use Session;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

use App\Repositories\website\dish\DishContract as rDish;

class Dish extends Controller
{

    public function __construct()
    {
    }
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index(Request $request,rDish $rDish)
    {

        $oResults=[];

        $request->merge(['getAllRecords'=>1]);
        if(isset($request->type) && $request->type=="mostSelling"){
            $oResults=$rDish->getMostSellingDish($request);
        }else{

            $oResults=$rDish->getByFilter($request);
        }

        return view('website.restaurant.dish',compact('request','oResults'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function show($id)
    {


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function edit($id)
    {


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function update($id, Request $request)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function destroy($id)
    {

    }


}
