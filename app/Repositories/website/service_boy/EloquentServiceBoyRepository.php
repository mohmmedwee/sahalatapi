<?php
namespace App\Repositories\website\service_boy;

use Session;
use App\Models\ServiceBoy;
use App\Repositories\website\service_boy\ServiceBoyContract;

class EloquentServiceBoyRepository implements ServiceBoyContract
{

    public function getByFilter($data)
    {

        $oResults = new ServiceBoy();

        if (isset($data['id']) && !empty($data['id'])) {
            $oResults = $oResults->where('id', '=' , $data['id']);
        }
        if (isset($data['users_id']) && !empty($data['users_id'])) {
            $oResults = $oResults->where('users_id', '=' , $data['users_id']);
        }
        if (isset($data['manager_id']) && !empty($data['manager_id'])) {
            $oResults = $oResults->where('manager_id', '=' , $data['manager_id']);
        }
        if (isset($data['service_company_id']) && !empty($data['service_company_id'])) {
            $oResults = $oResults->where('service_company_id', '=' , $data['service_company_id']);
        }
        if (isset($data['status']) && !empty($data['status'])) {
            $oResults = $oResults->where('status', '=' , $data['status']);
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

          $oResults = new ServiceBoy();

          $oResults = $oResults->get();

$aResults=[];

foreach($oResults as $result){
$aResults[$result->id]=$result->name;
}
          return $aResults;
    }

    public function create($data)
    {

        $result = ServiceBoy::create($data);

        if ($result) {
            Session::flash('flash_message', 'service_boy added!');
            return true;
        } else {
            return false;
        }
    }

    public function show($id)
    {

$service_boy = ServiceBoy::findOrFail($id);

        return $service_boy;
    }

    public function destroy($id)
    {

        $result =  ServiceBoy::destroy($id);

        if ($result) {
            Session::flash('flash_message', 'service_boy deleted!');
            return true;
        } else {
            return false;
        }
    }

    public function update($id,$data)
    {
$service_boy = ServiceBoy::findOrFail($id);
       $result= $service_boy->update($data->all());
        if ($result) {
            Session::flash('flash_message', 'service_boy updated!');
            return true;
        } else {
            return false;
        }

    }

}
