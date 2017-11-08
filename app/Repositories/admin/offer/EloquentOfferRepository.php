<?php
namespace App\Repositories\admin\offer;

use Session;
use App\Models\Offer;
use App\Repositories\admin\offer\OfferContract;

class EloquentOfferRepository implements OfferContract
{

    public function getByFilter($data,&$statistic=null)
    {

        $oResults = new Offer();


if(canAccess('admin.offer.allData')) {

}elseif(canAccess('admin.offer.groupData')){
$oResults = $oResults->where('offer.users_id','=',  current_user()->getUser()->id);
}elseif(canAccess('admin.offer.userData')){

}else{return [];}

        if (isset($data['id']) && !empty($data['id'])) {
            $oResults = $oResults->where('offer.id', '=' , $data['id']);
        }
        if (isset($data['deliver_number']) && !empty($data['deliver_number'])) {
            $oResults = $oResults->where('offer.deliver_number', '=' , $data['deliver_number']);
        }
        if (isset($data['price']) && !empty($data['price'])) {
            $oResults = $oResults->where('offer.price', '=' , $data['price']);
        }
        if (isset($data['created_at']) && !empty($data['created_at'])) {
            $oResults = $oResults->where('offer.created_at', '=' , $data['created_at']);
        }
        if (isset($data['updated_at']) && !empty($data['updated_at'])) {
            $oResults = $oResults->where('offer.updated_at', '=' , $data['updated_at']);
        }


if ($statistic !== null) {
$statistic = $this->getStatistic(clone $oResults);
}

        if (isset($data['order']) && !empty($data['order'])) {
            $sort = (isset($data['sort']) && !empty($data['sort'])) ? $data['sort'] : 'desc';
            $oResults = $oResults->orderBy('offer.'.$data['order'], $sort);
        }else{
$oResults = $oResults->orderBy('offer.id', 'desc');
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

          $oResults = new Offer();

          $oResults = $oResults->get();

$aResults=[];

foreach($oResults as $result){
$aResults[$result->id]=$result->deliver_number .' ( '.$result->price.' ) ';
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

        $result = Offer::create($data);

        if ($result) {
            Session::flash('flash_message', 'offer added!');
            return true;
        } else {
            return false;
        }
    }

    public function show($id)
    {

$offer = Offer::findOrFail($id);

        return $offer;
    }

    public function destroy($id)
    {

        $result =  Offer::destroy($id);

        if ($result) {
            Session::flash('flash_message', 'offer deleted!');
            return true;
        } else {
            return false;
        }
    }

    public function update($id,$data)
    {
$offer = Offer::findOrFail($id);
       $result= $offer->update(is_array($data)? $data:$data->all());
        if ($result) {
            Session::flash('flash_message', 'offer updated!');
            return true;
        } else {
            return false;
        }

    }

}
