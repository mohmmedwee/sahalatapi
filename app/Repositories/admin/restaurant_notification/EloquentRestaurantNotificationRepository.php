<?php
namespace App\Repositories\admin\restaurant_notification;

use Session;
use App\Models\RestaurantNotification;
use App\Repositories\admin\restaurant_notification\RestaurantNotificationContract;

class EloquentRestaurantNotificationRepository implements RestaurantNotificationContract
{

    public function getByFilter($data,&$statistic=null)
    {

        $oResults = new RestaurantNotification();


if(canAccess('admin.restaurant_notification.allData')) {

}elseif(canAccess('admin.restaurant_notification.groupData')){
$oResults = $oResults->where('restaurant_notification.users_id','=',  current_user()->getUser()->id);
}elseif(canAccess('admin.restaurant_notification.userData')){

}else{return [];}

        if (isset($data['id']) && !empty($data['id'])) {
            $oResults = $oResults->where('restaurant_notification.id', '=' , $data['id']);
        }
        if (isset($data['restaurant_id']) && !empty($data['restaurant_id'])) {
            $oResults = $oResults->where('restaurant_notification.restaurant_id', '=' , $data['restaurant_id']);
        }
        if (isset($data['order_status']) && !empty($data['order_status'])) {
            $oResults = $oResults->where('restaurant_notification.order_status', '=' , $data['order_status']);
        }
        if (isset($data['status']) && !empty($data['status'])) {
            $oResults = $oResults->where('restaurant_notification.status', '=' , $data['status']);
        }
        if (isset($data['created_at']) && !empty($data['created_at'])) {
            $oResults = $oResults->where('restaurant_notification.created_at', '=' , $data['created_at']);
        }
        if (isset($data['updated_at']) && !empty($data['updated_at'])) {
            $oResults = $oResults->where('restaurant_notification.updated_at', '=' , $data['updated_at']);
        }


if ($statistic !== null) {
$statistic = $this->getStatistic(clone $oResults);
}

        if (isset($data['order']) && !empty($data['order'])) {
            $sort = (isset($data['sort']) && !empty($data['sort'])) ? $data['sort'] : 'desc';
            $oResults = $oResults->orderBy('restaurant_notification.'.$data['order'], $sort);
        }else{
$oResults = $oResults->orderBy('restaurant_notification.id', 'desc');
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

          $oResults = new RestaurantNotification();

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

        $result = RestaurantNotification::create($data);

        if ($result) {
            Session::flash('flash_message', 'restaurant_notification added!');
            return true;
        } else {
            return false;
        }
    }

    public function show($id)
    {

$restaurant_notification = RestaurantNotification::findOrFail($id);

        return $restaurant_notification;
    }

    public function destroy($id)
    {

        $result =  RestaurantNotification::destroy($id);

        if ($result) {
            Session::flash('flash_message', 'restaurant_notification deleted!');
            return true;
        } else {
            return false;
        }
    }

    public function update($id,$data)
    {
$restaurant_notification = RestaurantNotification::findOrFail($id);
       $result= $restaurant_notification->update(is_array($data)? $data:$data->all());
        if ($result) {
            Session::flash('flash_message', 'restaurant_notification updated!');
            return true;
        } else {
            return false;
        }

    }

}
