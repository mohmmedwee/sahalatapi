<?php

namespace App\Http\Controllers\admin\service_company_order;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use App\Http\Requests\admin\service_company_order\createRequest;
use App\Http\Requests\admin\service_company_order\editRequest;
use Session;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;


use App\Models\ServiceCompanyOrder as mServiceCompanyOrder;
use App\Models\ServiceCompanyOrderService as mDriverService;

use App\Repositories\admin\service_company_order\ServiceCompanyOrderContract as rServiceCompanyOrder;

use App\Repositories\admin\users\UsersContract as rUsers;
use App\Repositories\admin\service_company\ServiceCompanyContract as rServiceCompany;
use App\Repositories\admin\service_boy\ServiceBoyContract as rServiceBoy;
use App\Repositories\admin\order\OrderContract as rOrder;
use App\Repositories\admin\service\ServiceContract as rService;
use App\Repositories\admin\service_company_order_service\ServiceCompanyOrderServiceContract as rDriverService;
use App\Repositories\admin\restaurant_users\RestaurantUsersContract as rRestaurantUsers;

class ServiceCompanyOrder extends Controller
{
    private $rServiceCompanyOrder;

    public function __construct(rServiceCompanyOrder $rServiceCompanyOrder)
    {
        $this->rServiceCompanyOrder = $rServiceCompanyOrder;
    }

    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index(Request $request)
    {


        $oResults = $this->rServiceCompanyOrder->getByFilter($request);

        return view('admin.service_company_order.index', compact('oResults', 'request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return view
     */
    public function create(
        Request $request,
        rUsers $rUsers,
        rServiceCompany $rServiceCompany,
        rOrder $rOrder,
        rService $rService,
        rServiceBoy $rServiceBoy,
        rRestaurantUsers $rRestaurantUsers
    ) {
        $oRestaurantUsers = $rRestaurantUsers->getByFilter(['type' => config('array.restaurant_users_type_driver_index')]);

        $usersList = [];
        foreach ($oRestaurantUsers as $oRestaurantUser) {
            $usersList[$oRestaurantUser->users->id] = $oRestaurantUser->users->first_name . ' ' . $oRestaurantUser->users->last;
        }

        $serviceCompanyList = $rServiceCompany->getAllList();
        $serviceBoyList = $rServiceBoy->getAllList();

        $serviceList = $rService->getAllList();


        return view('admin.service_company_order.create',
            compact('request', 'usersList', 'serviceCompanyList', 'serviceBoyList', 'serviceList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return redirect
     */
    public function store(createRequest $request, mDriverService $mDriverService)
    {


        $oResults = $this->rServiceCompanyOrder->create($request->all());


        if (isset($request->service) && is_array($request->service)) {
            foreach ($request->service as $service_id => $numberOne) {
                $mDriverService::create(['service_company_order_id' => $oResults->id, 'service_id' => $service_id]);
            }
        }

        return redirect('admin/service_company_order');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return view
     */
    public function show($id, Request $request, rDriverService $rDriverService)
    {


        $service_company_order = $this->rServiceCompanyOrder->show($id);
        $request->merge(['service_company_order_id' => $id, 'page_name' => 'page']);

        $oServiceResults = $rDriverService->getByFilter($request);


        return view('admin.service_company_order.show', compact('service_company_order', 'request', 'oServiceResults'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return view
     */
    public function edit($id, rUsers $rUsers,Request $request,
        rServiceCompany $rServiceCompany,
        rOrder $rOrder,
        rService $rService,
        rServiceBoy $rServiceBoy,
        rRestaurantUsers $rRestaurantUsers)
    {


        $service_company_order = $this->rServiceCompanyOrder->show($id);

        $service_company_order_service=[];
        if (count($service_company_order->service) ) {
            foreach ($service_company_order->service as $service) {
                $service_company_order_service[$service->service_id]=$service->service_id;
            }
        }
$request->merge(['service'=>$service_company_order_service]);
        $oRestaurantUsers = $rRestaurantUsers->getByFilter(['type' => config('array.restaurant_users_type_driver_index')]);

        $usersList = [];
        foreach ($oRestaurantUsers as $oRestaurantUser) {
            $usersList[$oRestaurantUser->users->id] = $oRestaurantUser->users->first_name . ' ' . $oRestaurantUser->users->last;
        }

        $serviceCompanyList = $rServiceCompany->getAllList();
        $serviceBoyList = $rServiceBoy->getAllList();

        $serviceList = $rService->getAllList();

        return view('admin.service_company_order.edit',
            compact('service_company_order','request', 'usersList', 'serviceCompanyList', 'serviceBoyList', 'serviceList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     *
     * @return redirect
     */
    public function update($id, editRequest $request, mDriverService $mDriverService)
    {

        $result = $this->rServiceCompanyOrder->update($id, $request);

        if (isset($request->service) && is_array($request->service)) {
            $mDriverService::where(['service_company_order_id' => $id])->delete();
            foreach ($request->service as $service_id => $numberOne) {
                $mDriverService::create(['service_company_order_id' => $id, 'service_id' => $service_id]);
            }
        }
        return redirect('admin/service_company_order');
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
        $service_company_order = $this->rServiceCompanyOrder->destroy($id);
        return redirect('admin/service_company_order');
    }


}
