<?php
namespace App\Repositories\admin\service_company_order_service;

use Session;
use App\Models\ServiceCompanyOrderService;
use App\Repositories\admin\service_company_order_service\ServiceCompanyOrderServiceContract;

class EloquentServiceCompanyOrderServiceRepository implements ServiceCompanyOrderServiceContract
{

    public function getByFilter($data)
    {

        $oResults = ServiceCompanyOrderService::with('service');


//if(canAccess('admin.service_company_order_service.allData')) {
//
//}elseif(canAccess('admin.service_company_order_service.groupData')){
//$oResults = $oResults->where('users_id','=',  current_user()->getUser()->id);
//}elseif(canAccess('admin.service_company_order_service.userData')){
//
//}else{return;}

        if (isset($data['id']) && !empty($data['id'])) {
            $oResults = $oResults->where('id', '=' , $data['id']);
        }
        if (isset($data['service_company_order_id']) && !empty($data['service_company_order_id'])) {
            $oResults = $oResults->where('service_company_order_id', '=' , $data['service_company_order_id']);
        }
        if (isset($data['service_id']) && !empty($data['service_id'])) {
            $oResults = $oResults->where('service_id', '=' , $data['service_id']);
        }
        if (isset($data['order']) && !empty($data['order'])) {
            $sort = (isset($data['sort']) && !empty($data['sort'])) ? $data['sort'] : 'desc';
            $oResults = $oResults->orderBy($data['order'], $sort);
        }else{
$oResults = $oResults->orderBy('id', 'desc');
}


        if(isset($data['getAllRecords']) && !empty($data['getAllRecords'])){
             $oResults = $oResults->get();
        }
        elseif (isset($data['page_name']) && !empty($data['page_name'])) {
             $oResults = $oResults->paginate(config('sahalat.pagination_size'), ['*'], $data['page_name']);
        }else{
             $oResults = $oResults->paginate(config('sahalat.pagination_size'));
        }
        return $oResults;
    }

    public function getAllList($data=[]){

          $oResults = new ServiceCompanyOrderService();

          $oResults = $oResults->get();

$aResults=[];

foreach($oResults as $result){
$aResults[$result->id]=$result->name;
}
          return $aResults;
    }

    public function create($data)
    {

        $result = ServiceCompanyOrderService::create($data);

        if ($result) {
            Session::flash('flash_message', 'service_company_order_service added!');
            return true;
        } else {
            return false;
        }
    }

    public function show($id)
    {

$service_company_order_service = ServiceCompanyOrderService::findOrFail($id);

        return $service_company_order_service;
    }

    public function destroy($id)
    {

        $result =  ServiceCompanyOrderService::destroy($id);

        if ($result) {
            Session::flash('flash_message', 'service_company_order_service deleted!');
            return true;
        } else {
            return false;
        }
    }

    public function update($id,$data)
    {
$service_company_order_service = ServiceCompanyOrderService::findOrFail($id);
       $result= $service_company_order_service->update(is_array($data)? $data:$data->all());
        if ($result) {
            Session::flash('flash_message', 'service_company_order_service updated!');
            return true;
        } else {
            return false;
        }

    }

}
