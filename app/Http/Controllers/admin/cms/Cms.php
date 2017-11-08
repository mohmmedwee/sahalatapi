<?php

namespace App\Http\Controllers\admin\cms;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use App\Http\Requests\admin\cms\createRequest;
use App\Http\Requests\admin\cms\editRequest;
use Session;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;


use App\Models\Cms as mCms;
use App\Repositories\admin\cms\CmsContract as rCms;


class Cms extends Controller
{
    private $rCms;

    public function __construct(rCms $rCms)
    {
        $this->rCms=$rCms;
    }
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index(Request $request)
    {


        $oResults=$this->rCms->getByFilter($request);

        return view('admin.cms.index', compact('oResults','request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return view
     */
    public function create(Request $request)
    {


        return view('admin.cms.create',compact('request'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return redirect
     */
    public function store(createRequest $request)
    {


        $oResults=$this->rCms->create($request->all());

        return redirect('admin/cms');
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


        $cms=$this->rCms->show($id);
      $request->merge(['cms_id'=>$id,'page_name'=>'page']);



        return view('admin.cms.show', compact('cms','request'));
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


        $cms=$this->rCms->show($id);


        return view('admin.cms.edit', compact('cms'));
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

        $result=$this->rCms->update($id,$request);

        return redirect('admin/cms');
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
        $cms=$this->rCms->destroy($id);
        return redirect('admin/cms');
    }


}
