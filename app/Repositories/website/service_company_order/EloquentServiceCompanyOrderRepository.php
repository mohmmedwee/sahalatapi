<?php
namespace App\Repositories\website\service_company_order;

use Session;
use App\Models\ServiceCompanyOrder;
use App\Repositories\website\service_company_order\ServiceCompanyOrderContract;

class EloquentServiceCompanyOrderRepository implements ServiceCompanyOrderContract
{

    public function getByFilter($data)
    {

        $oResults = new ServiceCompanyOrder();

        if (isset($data['id']) && !empty($data['id'])) {
            $oResults = $oResults->where('id', '=' , $data['id']);
        }
        if (isset($data['users_id']) && !empty($data['users_id'])) {
            $oResults = $oResults->where('users_id', '=' , $data['users_id']);
        }
        if (isset($data['service_company_id']) && !empty($data['service_company_id'])) {
            $oResults = $oResults->where('service_company_id', '=' , $data['service_company_id']);
        }
        if (isset($data['order_id']) && !empty($data['order_id'])) {
            $oResults = $oResults->where('order_id', '=' , $data['order_id']);
        }
        if (isset($data['description']) && !empty($data['description'])) {
            $oResults = $oResults->where('description', '=' , $data['description']);
        }
        if (isset($data['status']) && !empty($data['status'])) {
            $oResults = $oResults->where('status', '=' , $data['status']);
        }
        if (isset($data['notification']) && !empty($data['notification'])) {
            $oResults = $oResults->where('notification', '=' , $data['notification']);
        }
        if (isset($data['created_at']) && !empty($data['created_at'])) {
            $oResults = $oResults->where('created_at', '=' , $data['created_at']);
        }
        if (isset($data['updated_at']) && !empty($data['updated_at'])) {
            $oResults = $oResults->where('updated_at', '=' , $data['updated_at']);
        }
        if (isset($data['order']) && !empty($data['order'])) {
            $sort = (isset($data['sort']) && !empty($data['sort'])) ? $data['sort'] : 'desc';
            $oResults = $oResults->orderBy($data['order'], $sort);
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

          $oResults = new ServiceCompanyOrder();

          $oResults = $oResults->get();

$aResults=[];

foreach($oResults as $result){
$aResults[$result->id]=$result->name;
}
          return $aResults;
    }

    public function create($data)
    {

        $result = ServiceCompanyOrder::create($data);

        if ($result) {
            Session::flash('flash_message', 'service_company_order added!');
            return true;
        } else {
            return false;
        }
    }

    public function show($id)
    {

$service_company_order = ServiceCompanyOrder::findOrFail($id);

        return $service_company_order;
    }

    public function destroy($id)
    {

        $result =  ServiceCompanyOrder::destroy($id);

        if ($result) {
            Session::flash('flash_message', 'service_company_order deleted!');
            return true;
        } else {
            return false;
        }
    }

    public function update($id,$data)
    {
$service_company_order = ServiceCompanyOrder::findOrFail($id);
       $result= $service_company_order->update($data->all());
        if ($result) {
            Session::flash('flash_message', 'service_company_order updated!');
            return true;
        } else {
            return false;
        }

    }

}
