<?php

namespace App\Http\Controllers\website\deliver_package;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use App\Http\Requests\website\deliver_package\createRequest;
use App\Http\Requests\website\deliver_package\editRequest;
use Session;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;


use App\Models\DeliverPackage as mDeliverPackage;
use App\Repositories\website\deliver_package\DeliverPackageContract as rDeliverPackage;



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

        return view('website.deliver_package.index', compact('oResults','request','statistic'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return view
     */
    public function create(Request $request)
    {


        return view('website.deliver_package.create',compact('request'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return redirect
     */
    public function store(createRequest $request)
    {


        $oResults=$this->rDeliverPackage->create($request->all());

        return redirect('website/deliver_package');
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



        return view('website.deliver_package.show', compact('deliver_package','request'));
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


        return view('website.deliver_package.edit', compact('deliver_package'));
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

        return redirect('website/deliver_package');
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
        return redirect('website/deliver_package');
    }


}
