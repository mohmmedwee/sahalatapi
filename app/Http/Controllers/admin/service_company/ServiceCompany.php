<?php

namespace App\Http\Controllers\admin\service_company;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use App\Http\Requests\admin\service_company\createRequest;
use App\Http\Requests\admin\service_company\editRequest;
use Session;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;


use App\Models\ServiceCompany as mServiceCompany;
use App\Repositories\admin\service_company\ServiceCompanyContract as rServiceCompany;

 use App\Repositories\admin\service_boy\ServiceBoyContract as rServiceBoy;
 use App\Repositories\admin\service_company_order\ServiceCompanyOrderContract as rServiceCompanyOrder;


use App\Repositories\admin\users\UsersContract as rUsers;

class ServiceCompany extends Controller
{
    private $rServiceCompany;

    public function __construct(rServiceCompany $rServiceCompany)
    {
        $this->rServiceCompany=$rServiceCompany;
    }
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index(Request $request)
    {


        $oResults=$this->rServiceCompany->getByFilter($request);

        return view('admin.service_company.index', compact('oResults','request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return view
     */
    public function create(Request $request,rUsers $rUsers)
    {


        $usersList=$rUsers->getAllList();
        return view('admin.service_company.create',compact('request','usersList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return redirect
     */
    public function store(createRequest $request)
    {


        $oResults=$this->rServiceCompany->create($request->all());

        return redirect('admin/service_company');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return view
     */
    public function show($id,Request $request,rServiceBoy $rServiceBoy,rServiceCompanyOrder $rServiceCompanyOrder)
    {


        $service_company=$this->rServiceCompany->show($id);
      $request->merge(['service_company_id'=>$id,'page_name'=>'page']);


    $request->page_name='page_service_boy';
    $oServiceBoyResults=$rServiceBoy->getByFilter($request);
    $request->page_name='page_service_company_order';
    $oServiceCompanyOrderResults=$rServiceCompanyOrder->getByFilter($request);

        return view('admin.service_company.show', compact('service_company','request','oServiceBoyResults','oServiceCompanyOrderResults'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return view
     */
    public function edit($id,rUsers $rUsers)
    {


        $service_company=$this->rServiceCompany->show($id);

        $usersList=$rUsers->getAllList();

        return view('admin.service_company.edit', compact('service_company','usersList'));
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

        $result=$this->rServiceCompany->update($id,$request);

        return redirect('admin/service_company');
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
        $service_company=$this->rServiceCompany->destroy($id);
        return redirect('admin/service_company');
    }


}
