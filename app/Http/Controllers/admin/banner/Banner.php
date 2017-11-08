<?php

namespace App\Http\Controllers\admin\banner;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use App\Http\Requests\admin\banner\createRequest;
use App\Http\Requests\admin\banner\editRequest;
use Session;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;


use App\Models\Banner as mBanner;
use App\Repositories\admin\banner\BannerContract as rBanner;


class Banner extends Controller
{
    private $rBanner;

    public function __construct(rBanner $rBanner)
    {
        $this->rBanner=$rBanner;
    }
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index(Request $request)
    {

        $oResults=$this->rBanner->getByFilter($request);

        return view('admin.banner.index', compact('oResults','request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return view
     */
    public function create(Request $request)
    {

        $oLastBanner=mBanner::orderBy('order','desc')->first();
        $lastBanner= count($oLastBanner)? $oLastBanner->order + 1:1;
        $request->merge(['order'=>$lastBanner]);
        return view('admin.banner.create',compact('request'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return redirect
     */
    public function store(createRequest $request)
    {


        $oResults=$this->rBanner->create($request->all());

        return redirect('admin/banner');
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


        $banner=$this->rBanner->show($id);
      $request->merge(['banner_id'=>$id,'page_name'=>'page']);



        return view('admin.banner.show', compact('banner','request'));
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


        $banner=$this->rBanner->show($id);


        return view('admin.banner.edit', compact('banner'));
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

        $result=$this->rBanner->update($id,$request);

        return redirect('admin/banner');
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
        $banner=$this->rBanner->destroy($id);
        return redirect('admin/banner');
    }


}
