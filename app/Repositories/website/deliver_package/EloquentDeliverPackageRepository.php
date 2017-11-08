<?php
namespace App\Repositories\website\deliver_package;

use Session;
use App\Models\DeliverPackage;
use App\Repositories\website\deliver_package\DeliverPackageContract;

class EloquentDeliverPackageRepository implements DeliverPackageContract
{

    public function getByFilter($data,&$statistic=null)
    {

        $oResults = new DeliverPackage();


if(canAccess('admin.deliver_package.allData')) {

}elseif(canAccess('admin.deliver_package.groupData')){
$oResults = $oResults->where('deliver_package.users_id','=',  current_user()->getUser()->id);
}elseif(canAccess('admin.deliver_package.userData')){

}else{return;}

        if (isset($data['id']) && !empty($data['id'])) {
            $oResults = $oResults->where('deliver_package.id', '=' , $data['id']);
        }
        if (isset($data['deliver_number']) && !empty($data['deliver_number'])) {
            $oResults = $oResults->where('deliver_package.deliver_number', '=' , $data['deliver_number']);
        }
        if (isset($data['price']) && !empty($data['price'])) {
            $oResults = $oResults->where('deliver_package.price', '=' , $data['price']);
        }
        if (isset($data['created_at']) && !empty($data['created_at'])) {
            $oResults = $oResults->where('deliver_package.created_at', '=' , $data['created_at']);
        }
        if (isset($data['updated_at']) && !empty($data['updated_at'])) {
            $oResults = $oResults->where('deliver_package.updated_at', '=' , $data['updated_at']);
        }


if ($statistic !== null) {
$statistic = $this->getStatistic(clone $oResults);
}

        if (isset($data['order']) && !empty($data['order'])) {
            $sort = (isset($data['sort']) && !empty($data['sort'])) ? $data['sort'] : 'desc';
            $oResults = $oResults->orderBy('deliver_package.'.$data['order'], $sort);
        }else{
$oResults = $oResults->orderBy('deliver_package.id', 'desc');
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

          $oResults = new DeliverPackage();

          $oResults = $oResults->get();

$aResults=[];

foreach($oResults as $result){
$aResults[$result->id]=$result->name;
}
          return $aResults;
    }


public function getStatistic($oResults)
{
$oTotalResults=clone $oResults;

$current_month = gmdate('Y-m');

$totalResults=$oTotalResults->count();
return ['total'=>$totalResults];
}


    public function create($data)
    {

        $result = DeliverPackage::create($data);

        if ($result) {
            Session::flash('flash_message', 'deliver_package added!');
            return true;
        } else {
            return false;
        }
    }

    public function show($id)
    {

$deliver_package = DeliverPackage::findOrFail($id);

        return $deliver_package;
    }

    public function destroy($id)
    {

        $result =  DeliverPackage::destroy($id);

        if ($result) {
            Session::flash('flash_message', 'deliver_package deleted!');
            return true;
        } else {
            return false;
        }
    }

    public function update($id,$data)
    {
$deliver_package = DeliverPackage::findOrFail($id);
       $result= $deliver_package->update(is_array($data)? $data:$data->all());
        if ($result) {
            Session::flash('flash_message', 'deliver_package updated!');
            return true;
        } else {
            return false;
        }

    }

}
