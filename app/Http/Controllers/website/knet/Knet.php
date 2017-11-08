<?php

namespace App\Http\Controllers\website\knet;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use App\Http\Requests\website\knet\createRequest;
use App\Http\Requests\website\knet\editRequest;
use Session;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;


use App\Models\Knet as mKnet;
use App\Repositories\website\knet\KnetContract as rKnet;


 use App\Repositories\website\payment\PaymentContract as rPayment;
 use App\Repositories\website\users\UsersContract as rUsers;
 use App\Repositories\website\order\OrderContract as rOrder;

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
    {

        $statistic=null;
        $oResults=$this->rKnet->getByFilter($request,$statistic);

        return view('website.knet.index', compact('oResults','request','statistic'));
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

        return view('website.knet.create',compact('request','paymentList','usersList','orderList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return redirect
     */
    public function store(createRequest $request)
    {


        $oResults=$this->rKnet->create($request->all());

        return redirect('website/knet');
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



        return view('website.knet.show', compact('knet','request'));
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
        return view('website.knet.edit', compact('knet','paymentList','usersList','orderList'));
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

        return redirect('website/knet');
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
        return redirect('website/knet');
    }


}
