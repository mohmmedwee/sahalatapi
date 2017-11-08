<?php
namespace App\Repositories\website\payment;

use Session;
use App\Models\Payment;
use App\Repositories\website\payment\PaymentContract;

class EloquentPaymentRepository implements PaymentContract
{

    public function getByFilter($data)
    {

        $oResults = new Payment();

        if (isset($data['id']) && !empty($data['id'])) {
            $oResults = $oResults->where('id', '=' , $data['id']);
        }
        if (isset($data['order_id']) && !empty($data['order_id'])) {
            $oResults = $oResults->where('order_id', '=' , $data['order_id']);
        }
        if (isset($data['users_id']) && !empty($data['users_id'])) {
            $oResults = $oResults->where('users_id', '=' , $data['users_id']);
        }
        if (isset($data['amount']) && !empty($data['amount'])) {
            $oResults = $oResults->where('amount', '=' , $data['amount']);
        }
        if (isset($data['status']) && !empty($data['status'])) {
            $oResults = $oResults->where('status', '=' , $data['status']);
        }
        if (isset($data['type']) && !empty($data['type'])) {
            $oResults = $oResults->where('type', '=' , $data['type']);
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

          $oResults = new Payment();

          $oResults = $oResults->get();

$aResults=[];

foreach($oResults as $result){
$aResults[$result->id]=$result->name;
}
          return $aResults;
    }

    public function create($data)
    {

        $result = Payment::create($data);

        if ($result) {
           // Session::flash('flash_message', 'payment added!');
            return $result->id;
        } else {
            return false;
        }
    }

    public function show($id)
    {

$payment = Payment::findOrFail($id);

        return $payment;
    }

    public function destroy($id)
    {

        $result =  Payment::destroy($id);

        if ($result) {
         //   Session::flash('flash_message', 'payment deleted!');
            return true;
        } else {
            return false;
        }
    }

    public function update($id,$data)
    {
$payment = Payment::findOrFail($id);
       $result= $payment->update((is_array($data))? $data:$data->all());
        if ($result) {
            Session::flash('flash_message', 'payment updated!');
            return $id;
        } else {
            return false;
        }

    }

}
