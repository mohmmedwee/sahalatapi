<?php
namespace App\Repositories\admin\service_company;

use Session;
use App\Models\ServiceCompany;
use App\Repositories\admin\service_company\ServiceCompanyContract;

class EloquentServiceCompanyRepository implements ServiceCompanyContract
{

    public function getByFilter($data)
    {

        $oResults = new ServiceCompany();


        if(canAccess('admin.service_company.allData')) {

        }elseif(canAccess('admin.service_company.groupData')){
            $oResults = $oResults->whereIn('id',  current_user()->getOwnServiceCompany());
        }elseif(canAccess('admin.service_company.userData')){

            $oResults = $oResults->whereIn('id',  current_user()->getOwnServiceCompany());

        }else{return [];}

        if (isset($data['id']) && !empty($data['id'])) {
            $oResults = $oResults->where('id', '=' , $data['id']);
        }
        if (isset($data['name']) && !empty($data['name'])) {
            $oResults = $oResults->where('name', '=' , $data['name']);
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
        }else{
            $oResults = $oResults->orderBy('updated_at', 'desc');
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

          $oResults = new ServiceCompany();


        if(canAccess('admin.service_company.allData')) {

        }elseif(canAccess('admin.service_company.groupData')){
            $oResults = $oResults->whereIn('id',  current_user()->getOwnServiceCompany());
        }elseif(canAccess('admin.service_company.userData')){

            $oResults = $oResults->whereIn('id',  current_user()->getOwnServiceCompany());
        }else{return [];}

          $oResults = $oResults->get();

$aResults=[];

foreach($oResults as $result){
$aResults[$result->id]=$result->name;
}
          return $aResults;
    }

    public function create($data)
    {

        $result = ServiceCompany::create($data);

        if ($result) {
            Session::flash('flash_message', 'service_company added!');
            return true;
        } else {
            return false;
        }
    }

    public function show($id)
    {

$service_company = ServiceCompany::findOrFail($id);

        return $service_company;
    }

    public function destroy($id)
    {

        $result =  ServiceCompany::destroy($id);

        if ($result) {
            Session::flash('flash_message', 'service_company deleted!');
            return true;
        } else {
            return false;
        }
    }

    public function update($id,$data)
    {
$service_company = ServiceCompany::findOrFail($id);
       $result= $service_company->update($data->all());
        if ($result) {
            Session::flash('flash_message', 'service_company updated!');
            return true;
        } else {
            return false;
        }

    }

}
