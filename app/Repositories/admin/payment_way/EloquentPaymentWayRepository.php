<?php
namespace App\Repositories\admin\payment_way;

use Session;
use App\Models\PaymentWay;
use App\Repositories\admin\payment_way\PaymentWayContract;

class EloquentPaymentWayRepository implements PaymentWayContract
{

    public function getByFilter($data,&$statistic=null)
    {

        $oResults = new PaymentWay();


if(canAccess('admin.payment_way.allData')) {

}elseif(canAccess('admin.payment_way.groupData')){
$oResults = $oResults->where('payment_way.users_id','=',  current_user()->getUser()->id);
}elseif(canAccess('admin.payment_way.userData')){

}else{return;}

        if (isset($data['id']) && !empty($data['id'])) {
            $oResults = $oResults->where('payment_way.id', '=' , $data['id']);
        }
        if (isset($data['restaurant_id']) && !empty($data['restaurant_id'])) {
            $oResults = $oResults->where('payment_way.restaurant_id', '=' , $data['restaurant_id']);
        }
        if (isset($data['payment_type']) && $data['payment_type'] !== '') {
            $oResults = $oResults->where('payment_way.payment_type', '=' , $data['payment_type']);
        }
        if (isset($data['type']) && $data['type'] !== '') {
            $oResults = $oResults->where('payment_way.type', '=' , $data['type']);
        }
        if (isset($data['setting']) && !empty($data['commission'])) {
            $oResults = $oResults->where('payment_way.commission', '=' , $data['commission']);
        }
        if (isset($data['created_at']) && !empty($data['created_at'])) {
            $oResults = $oResults->where('payment_way.created_at', '=' , $data['created_at']);
        }
        if (isset($data['updated_at']) && !empty($data['updated_at'])) {
            $oResults = $oResults->where('payment_way.updated_at', '=' , $data['updated_at']);
        }


if ($statistic !== null) {
$statistic = $this->getStatistic(clone $oResults);
}

        if (isset($data['order']) && !empty($data['order'])) {
            $sort = (isset($data['sort']) && !empty($data['sort'])) ? $data['sort'] : 'desc';
            $oResults = $oResults->orderBy('payment_way.'.$data['order'], $sort);
        }else{
$oResults = $oResults->orderBy('payment_way.id', 'desc');
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

          $oResults = new PaymentWay();

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

        $result = PaymentWay::create($data);

        if ($result) {
            Session::flash('flash_message', 'payment_way added!');
            return true;
        } else {
            return false;
        }
    }

    public function show($id)
    {

$payment_way = PaymentWay::findOrFail($id);

        return $payment_way;
    }

    public function destroy($id)
    {

        $result =  PaymentWay::destroy($id);

        if ($result) {
            Session::flash('flash_message', 'payment_way deleted!');
            return true;
        } else {
            return false;
        }
    }

    public function update($id,$data)
    {
$payment_way = PaymentWay::findOrFail($id);
       $result= $payment_way->update(is_array($data)? $data:$data->all());
        if ($result) {
            Session::flash('flash_message', 'payment_way updated!');
            return true;
        } else {
            return false;
        }

    }

}
