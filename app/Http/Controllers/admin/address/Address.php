<?php

namespace App\Http\Controllers\admin\address;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use App\Http\Requests\admin\address\createRequest;
use App\Http\Requests\admin\address\editRequest;
use Session;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;


use App\Models\Address as mAddress;
use App\Repositories\admin\address\AddressContract as rAddress;

use App\Repositories\admin\users\UsersContract as rUsers;
use App\Repositories\admin\area\AreaContract as rArea;

class Address extends Controller
{
    private $rAddress;

    public function __construct(rAddress $rAddress)
    {
        $this->rAddress = $rAddress;
    }

    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index(Request $request)
    {

notification('address_index',['users'=>current_user()->getUser()]);
        $oResults = $this->rAddress->getByFilter($request);
        $responseData = ['oResults'];
        return view('admin.address.index', compact('oResults', 'request', 'responseData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return view
     */
    public function create(Request $request, rUsers $rUsers, rArea $rArea)
    {

        $usersList = $rUsers->getAllList();
        $areaList = $rArea->getAllList();

        return view('admin.address.create', compact('request', 'usersList', 'areaList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return redirect
     */
    public function store(createRequest $request)
    {


        $oResults = $this->rAddress->create($request->all());

        return redirect('admin/address');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return view
     */
    public function show($id, Request $request)
    {


        $address = $this->rAddress->show($id);
        $request->merge(['address_id' => $id, 'page_name' => 'page']);


        return view('admin.address.show', compact('address', 'request'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return view
     */
    public function edit($id, rUsers $rUsers, rArea $rArea)
    {


        $address = $this->rAddress->show($id);


        $usersList = $rUsers->getAllList();
        $areaList = $rArea->getAllList();
        return view('admin.address.edit', compact('address', 'usersList', 'areaList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     *
     * @return redirect
     */
    public function update($id, editRequest $request)
    {

        $result = $this->rAddress->update($id, $request);

        return redirect('admin/address');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return redirect
     */
    public function destroy($id)
    {
        $address = $this->rAddress->destroy($id);
        return redirect('admin/address');
    }


}
