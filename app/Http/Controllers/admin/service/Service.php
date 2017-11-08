<?php

namespace App\Http\Controllers\admin\service;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use App\Http\Requests\admin\service\createRequest;
use App\Http\Requests\admin\service\editRequest;
use Session;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;


use App\Models\Service as mService;
use App\Repositories\admin\service\ServiceContract as rService;

 use App\Repositories\admin\service_company_order_service\ServiceCompanyOrderServiceContract as rServiceCompanyOrderService;

class Service extends Controller
{
    private $rService;

    public function __construct(rService $rService)
    {
        $this->rService=$rService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index(Request $request)
    {


        $oResults=$this->rService->getByFilter($request);

        return view('admin.service.index', compact('oResults','request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return view
     */
    public function create(Request $request)
    {


        return view('admin.service.create',compact('request'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return redirect
     */
    public function store(createRequest $request)
    {


        $oResults=$this->rService->create($request->all());

        return redirect('admin/service');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return view
     */
    public function show($id,Request $request,rServiceCompanyOrderService $rServiceCompanyOrderService)
    {


        $service=$this->rService->show($id);
      $request->merge(['service_id'=>$id,'page_name'=>'page']);


    $request->page_name='page_service_company_order_service';
    $oServiceCompanyOrderServiceResults=$rServiceCompanyOrderService->getByFilter($request);

        return view('admin.service.show', compact('service','request','oServiceCompanyOrderServiceResults'));
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


        $service=$this->rService->show($id);


        return view('admin.service.edit', compact('service'));
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

        $result=$this->rService->update($id,$request);

        return redirect('admin/service');
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
        $service=$this->rService->destroy($id);
        return redirect('admin/service');
    }


}
