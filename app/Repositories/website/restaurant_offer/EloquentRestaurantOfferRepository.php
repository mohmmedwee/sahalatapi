<?php
namespace App\Repositories\website\restaurant_offer;

use Session;
use App\Models\RestaurantOffer;
use App\Repositories\website\restaurant_offer\RestaurantOfferContract;

class EloquentRestaurantOfferRepository implements RestaurantOfferContract
{

    public function getByFilter($data,&$statistic=null)
    {

        $oResults = new RestaurantOffer();


if(canAccess('admin.restaurant_offer.allData')) {

}elseif(canAccess('admin.restaurant_offer.groupData')){
$oResults = $oResults->where('restaurant_offer.users_id','=',  current_user()->getUser()->id);
}elseif(canAccess('admin.restaurant_offer.userData')){

}else{return;}

        if (isset($data['id']) && !empty($data['id'])) {
            $oResults = $oResults->where('restaurant_offer.id', '=' , $data['id']);
        }
        if (isset($data['restaurant_id']) && !empty($data['restaurant_id'])) {
            $oResults = $oResults->where('restaurant_offer.restaurant_id', '=' , $data['restaurant_id']);
        }
        if (isset($data['offer_id']) && !empty($data['offer_id'])) {
            $oResults = $oResults->where('restaurant_offer.offer_id', '=' , $data['offer_id']);
        }
        if (isset($data['status']) && !empty($data['status'])) {
            $oResults = $oResults->where('restaurant_offer.status', '=' , $data['status']);
        }
        if (isset($data['created_at']) && !empty($data['created_at'])) {
            $oResults = $oResults->where('restaurant_offer.created_at', '=' , $data['created_at']);
        }
        if (isset($data['updated_at']) && !empty($data['updated_at'])) {
            $oResults = $oResults->where('restaurant_offer.updated_at', '=' , $data['updated_at']);
        }


if ($statistic !== null) {
$statistic = $this->getStatistic(clone $oResults);
}

        if (isset($data['order']) && !empty($data['order'])) {
            $sort = (isset($data['sort']) && !empty($data['sort'])) ? $data['sort'] : 'desc';
            $oResults = $oResults->orderBy('restaurant_offer.'.$data['order'], $sort);
        }else{
$oResults = $oResults->orderBy('restaurant_offer.id', 'desc');
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

          $oResults = new RestaurantOffer();

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

        $result = RestaurantOffer::create($data);

        if ($result) {
            Session::flash('flash_message', 'restaurant_offer added!');
            return true;
        } else {
            return false;
        }
    }

    public function show($id)
    {

$restaurant_offer = RestaurantOffer::findOrFail($id);

        return $restaurant_offer;
    }

    public function destroy($id)
    {

        $result =  RestaurantOffer::destroy($id);

        if ($result) {
            Session::flash('flash_message', 'restaurant_offer deleted!');
            return true;
        } else {
            return false;
        }
    }

    public function update($id,$data)
    {
$restaurant_offer = RestaurantOffer::findOrFail($id);
       $result= $restaurant_offer->update(is_array($data)? $data:$data->all());
        if ($result) {
            Session::flash('flash_message', 'restaurant_offer updated!');
            return true;
        } else {
            return false;
        }

    }

}
