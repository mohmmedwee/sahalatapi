<?php

namespace App\Http\Controllers\admin\knet;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use App\Http\Requests\admin\knet\createRequest;
use App\Http\Requests\admin\knet\editRequest;
use Session;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;


use App\Models\Knet as mKnet;
use App\Repositories\admin\knet\KnetContract as rKnet;


 use App\Repositories\admin\payment\PaymentContract as rPayment;
 use App\Repositories\admin\users\UsersContract as rUsers;
 use App\Repositories\admin\order\OrderContract as rOrder;

class Knet extends Controller
{
    private $rKnet;

    public function __construct(rKnet $rKnet)
    {
        $this->rKnet=$rKnet;
    }
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index(Request $request)
    {    $this->rKnet->exportExcel($request);

        $statistic=null;
        $oResults=$this->rKnet->getByFilter($request,$statistic);

        return view('admin.knet.index', compact('oResults','request','statistic'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return view
     */
    public function create(Request $request,rPayment $rPayment,rUsers $rUsers,rOrder $rOrder)
    {

$paymentList=$rPayment->getAllList();
$usersList=$rUsers->getAllList();
$orderList=$rOrder->getAllList();

        return view('admin.knet.create',compact('request','paymentList','usersList','orderList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return redirect
     */
    public function store(createRequest $request)
    {


        $oResults=$this->rKnet->create($request->all());

        return redirect('admin/knet');
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


        $knet=$this->rKnet->show($id);
      $request->merge(['knet_id'=>$id,'page_name'=>'page']);



        return view('admin.knet.show', compact('knet','request'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return view
     */
    public function edit($id,rPayment $rPayment,rUsers $rUsers,rOrder $rOrder)
    {


        $knet=$this->rKnet->show($id);


 $paymentList=$rPayment->getAllList();
 $usersList=$rUsers->getAllList();
 $orderList=$rOrder->getAllList();
        return view('admin.knet.edit', compact('knet','paymentList','usersList','orderList'));
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

        $result=$this->rKnet->update($id,$request);

        return redirect('admin/knet');
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
        $knet=$this->rKnet->destroy($id);
        return redirect('admin/knet');
    }


}
