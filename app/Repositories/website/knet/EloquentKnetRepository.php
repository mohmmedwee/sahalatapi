<?php
namespace App\Repositories\website\knet;

use Session;
use App\Models\Knet;
use App\Repositories\website\knet\KnetContract;

class EloquentKnetRepository implements KnetContract
{

    public function getByFilter($data,&$statistic=null)
    {

        $oResults = new Knet();


if(canAccess('admin.knet.allData')) {

}elseif(canAccess('admin.knet.groupData')){
$oResults = $oResults->where('knet.users_id','=',  current_user()->getUser()->id);
}elseif(canAccess('admin.knet.userData')){

}else{return;}

        if (isset($data['id']) && !empty($data['id'])) {
            $oResults = $oResults->where('knet.id', '=' , $data['id']);
        }
        if (isset($data['payment_id']) && !empty($data['payment_id'])) {
            $oResults = $oResults->where('knet.payment_id', '=' , $data['payment_id']);
        }
        if (isset($data['users_id']) && !empty($data['users_id'])) {
            $oResults = $oResults->where('knet.users_id', '=' , $data['users_id']);
        }
        if (isset($data['order_id']) && !empty($data['order_id'])) {
            $oResults = $oResults->where('knet.order_id', '=' , $data['order_id']);
        }
        if (isset($data['PaymentID']) && !empty($data['PaymentID'])) {
            $oResults = $oResults->where('knet.PaymentID', '=' , $data['PaymentID']);
        }
        if (isset($data['Result']) && !empty($data['Result'])) {
            $oResults = $oResults->where('knet.Result', '=' , $data['Result']);
        }
        if (isset($data['PostDate']) && !empty($data['PostDate'])) {
            $oResults = $oResults->where('knet.PostDate', '=' , $data['PostDate']);
        }
        if (isset($data['TranID']) && !empty($data['TranID'])) {
            $oResults = $oResults->where('knet.TranID', '=' , $data['TranID']);
        }
        if (isset($data['Auth']) && !empty($data['Auth'])) {
            $oResults = $oResults->where('knet.Auth', '=' , $data['Auth']);
        }
        if (isset($data['Ref']) && !empty($data['Ref'])) {
            $oResults = $oResults->where('knet.Ref', '=' , $data['Ref']);
        }
        if (isset($data['TrackID']) && !empty($data['TrackID'])) {
            $oResults = $oResults->where('knet.TrackID', '=' , $data['TrackID']);
        }
        if (isset($data['UDF1']) && !empty($data['UDF1'])) {
            $oResults = $oResults->where('knet.UDF1', '=' , $data['UDF1']);
        }
        if (isset($data['UDF2']) && !empty($data['UDF2'])) {
            $oResults = $oResults->where('knet.UDF2', '=' , $data['UDF2']);
        }
        if (isset($data['UDF3']) && !empty($data['UDF3'])) {
            $oResults = $oResults->where('knet.UDF3', '=' , $data['UDF3']);
        }
        if (isset($data['UDF4']) && !empty($data['UDF4'])) {
            $oResults = $oResults->where('knet.UDF4', '=' , $data['UDF4']);
        }
        if (isset($data['UDF5']) && !empty($data['UDF5'])) {
            $oResults = $oResults->where('knet.UDF5', '=' , $data['UDF5']);
        }
        if (isset($data['created_at']) && !empty($data['created_at'])) {
            $oResults = $oResults->where('knet.created_at', '=' , $data['created_at']);
        }
        if (isset($data['updated_at']) && !empty($data['updated_at'])) {
            $oResults = $oResults->where('knet.updated_at', '=' , $data['updated_at']);
        }


if ($statistic !== null) {
$statistic = $this->getStatistic(clone $oResults);
}

        if (isset($data['order']) && !empty($data['order'])) {
            $sort = (isset($data['sort']) && !empty($data['sort'])) ? $data['sort'] : 'desc';
            $oResults = $oResults->orderBy('knet.'.$data['order'], $sort);
        }else{
$oResults = $oResults->orderBy('knet.id', 'desc');
}


        if(isset($data['getAllRecords']) && !empty($data['getAllRecords'])){
             $oResults = $oResults->get();
        }
        elseif (isset($data['page_name']) && !empty($data['page_name'])) {
             $oResults = $oResults->paginate(config('deera.pagination_size'), ['*'], $data['page_name']);
        }else{
             $oResults = $oResults->paginate(config('deera.pagination_size'));
        }
        return $oResults;
    }

    public function getAllList($data=[]){

          $oResults = new Knet();

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

        $result = Knet::create($data);

        if ($result) {
            Session::flash('flash_message', 'knet added!');
            return true;
        } else {
            return false;
        }
    }

    public function show($id)
    {

$knet = Knet::findOrFail($id);

        return $knet;
    }

    public function destroy($id)
    {

        $result =  Knet::destroy($id);

        if ($result) {
            Session::flash('flash_message', 'knet deleted!');
            return true;
        } else {
            return false;
        }
    }

    public function update($id,$data)
    {
$knet = Knet::findOrFail($id);
       $result= $knet->update(is_array($data)? $data:$data->all());
        if ($result) {
            Session::flash('flash_message', 'knet updated!');
            return true;
        } else {
            return false;
        }

    }

}
