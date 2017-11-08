<?php

namespace App\Http\Controllers\website\address;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use App\Http\Requests\website\address\createRequest;
use App\Http\Requests\website\address\editRequest;
use Session;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;


use App\Models\Address as mAddress;
use App\Repositories\website\address\AddressContract as rAddress;

 use App\Repositories\website\users\UsersContract as rUsers;
 use App\Repositories\website\area\AreaContract as rArea;



use Illuminate\Http\JsonResponse;

class Address extends Controller
{
    private $rAddress;

    public function __construct(rAddress $rAddress)
    {
        $this->rAddress=$rAddress;
    }
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index(Request $request)
    {


        $oResults=$this->rAddress->getByFilter($request);

        return view('website.address.index', compact('oResults','request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return view
     */
    public function create(Request $request,rUsers $rUsers,rArea $rArea)
    {

$usersList=$rUsers->getAllList();
$areaList=$rArea->getAllList();

        return view('website.address.create',compact('request','usersList','areaList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return redirect
     */
    public function store(createRequest $request)
    {


        $oResults=$this->rAddress->create($request->all());

        return redirect('website/address');
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


        $address=$this->rAddress->show($id);
      $request->merge(['address_id'=>$id,'page_name'=>'page']);



        return view('website.address.show', compact('address','request'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return view
     */
    public function edit($id,rUsers $rUsers,rArea $rArea)
    {


        $address=$this->rAddress->show($id);


 $usersList=$rUsers->getAllList();
 $areaList=$rArea->getAllList();
        return view('website.address.edit', compact('address','usersList','areaList'));
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

        $request->merge(['users_id'=>  current_user()->getUser()->id]);
$request->users_id=current_user()->getUser()->id;

        if(isset($request->add_address)){
       $this->rAddress->create($request->all());
        }elseif(isset($request->edit_address)){
            $this->rAddress->update($id,$request);
        }


        if($request->ajax()){
            return new JsonResponse(['status'=>'success','redirect'=>'back'], 200);
        }else{
            return redirect('/users#tab_default_2');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return redirect
     */
    public function destroy($id,Request $request)
    {
        $address=$this->rAddress->destroy($id);
        

          if($request->ajax()){
            return new JsonResponse(['status'=>'success','redirect'=>'back'], 200);
        }else{
            return redirect('/users#tab_default_2');
        }
        //return redirect('/users#tab_default_2');

    }

    public function selectAddressFromMap(){
        return view('website.address.selectAddressFromMap');
    }




    public function getAllArea(rArea $rArea, Request $request){

        $areaList=$rArea->getAllListArea();


        return view('website.address.area',compact('areaList','request'));
    }

}
