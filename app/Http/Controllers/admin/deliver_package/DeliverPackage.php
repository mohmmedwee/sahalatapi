<?php

namespace App\Http\Controllers\admin\deliver_package;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use App\Http\Requests\admin\deliver_package\createRequest;
use App\Http\Requests\admin\deliver_package\editRequest;
use Session;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;


use App\Models\DeliverPackage as mDeliverPackage;
use App\Repositories\admin\deliver_package\DeliverPackageContract as rDeliverPackage;



class DeliverPackage extends Controller
{
    private $rDeliverPackage;

    public function __construct(rDeliverPackage $rDeliverPackage)
    {
        $this->rDeliverPackage=$rDeliverPackage;
    }
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index(Request $request)
    {

        $statistic=null;
        $oResults=$this->rDeliverPackage->getByFilter($request,$statistic);

        return view('admin.deliver_package.index', compact('oResults','request','statistic'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return view
     */
    public function create(Request $request)
    {


        return view('admin.deliver_package.create',compact('request'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return redirect
     */
    public function store(createRequest $request)
    {


        $oResults=$this->rDeliverPackage->create($request->all());

        return redirect('admin/deliver_package');
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


        $deliver_package=$this->rDeliverPackage->show($id);
      $request->merge(['deliver_package_id'=>$id,'page_name'=>'page']);



        return view('admin.deliver_package.show', compact('deliver_package','request'));
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


        $deliver_package=$this->rDeliverPackage->show($id);


        return view('admin.deliver_package.edit', compact('deliver_package'));
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

        $result=$this->rDeliverPackage->update($id,$request);

        return redirect('admin/deliver_package');
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
        $deliver_package=$this->rDeliverPackage->destroy($id);
        return redirect('admin/deliver_package');
    }


}
