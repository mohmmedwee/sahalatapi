<?php
namespace App\Repositories\admin\restaurant_users;

use Session;
use App\Models\RestaurantUsers;
use App\Models\Order;
use App\Repositories\admin\restaurant_users\RestaurantUsersContract;

class EloquentRestaurantUsersRepository implements RestaurantUsersContract
{

    public function getByFilter($data)
    {

        $oResults =  RestaurantUsers::with('users','restaurant');


        if(canAccess('admin.restaurant_users.allData')){

        }elseif(canAccess('admin.restaurant_users.groupData')){
            $oResults = $oResults->whereIn('restaurant_id', current_user()->getRestaurant());
        }elseif(canAccess('admin.restaurant_users.userData')){
            $oResults= $oResults->where('users_id','=',current_user()->getUser()->id);
        }


//        if (isset($data['date']) && !empty($data['date'])) {
//$oResults=$oResults->with(['order'=>function($query)use($data){
//    $query=$query->where('deliver_date','=',$data['date'])
//    ->orderBy('order.status','desc');
//}]);
//        }

        if (isset($data['id']) && !empty($data['id'])) {
            $oResults = $oResults->where('id', '=' , $data['id']);
        }
        if (isset($data['users_id']) && !empty($data['users_id'])) {
            $oResults = $oResults->where('users_id', '=' , $data['users_id']);
        }
        if (isset($data['restaurant_id']) && !empty($data['restaurant_id'])) {
            $oResults = $oResults->where('restaurant_id', '=' , $data['restaurant_id']);
        }
        if (isset($data['status']) && !empty($data['status'])) {
            $oResults = $oResults->where('status', '=' , $data['status']);
        }
        if (isset($data['type']) && !empty($data['type'])) {
            $oResults = $oResults->where('type', '=' , $data['type']);
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

        foreach($oResults as &$oResult){
            $oResult['order']=Order::join('order_driver','order.id','=','order_driver.order_id')->where('order_driver.users_id','=',$oResult->users_id)
                ->select(['order.*','order_driver.status as order_driver_status ','order_driver.note as order_driver_note ','order_driver.id as order_driver_id '
                    ,'order_driver.current_lat as order_driver_current_lat ','order_driver.current_long as order_driver_current_long ']);

        if (isset($data['date']) && !empty($data['date'])) {
            $oResult['order']= $oResult['order']->where('deliver_date','=',$data['date']);
        }

                 $oResult['order']= $oResult['order']->get();
        }
        return $oResults;
    }

    public function getAllList($data=[]){

          $oResults = new RestaurantUsers();

          $oResults = $oResults->get();

$aResults=[];

foreach($oResults as $result){
$aResults[$result->id]=$result->name;
}
          return $aResults;
    }

    public function create($data)
    {

        $track=  new \App\Models\AuditTrack();$track->track(['action'=>'Add user to restaurant','description'=>json_encode($data)]);
        $result = RestaurantUsers::create($data);

        if ($result) {
            Session::flash('flash_message', 'restaurant_users added!');
            return true;
        } else {
            return false;
        }
    }

    public function show($id)
    {

$restaurant_users = RestaurantUsers::findOrFail($id);

        return $restaurant_users;
    }

    public function destroy($id)
    {

        $track=  new \App\Models\AuditTrack();$track->track(['action'=>'delete restaurant user','description'=>json_encode($this->show($id))]);
        $result =  RestaurantUsers::destroy($id);

        if ($result) {
            Session::flash('flash_message', 'restaurant_users deleted!');
            return true;
        } else {
            return false;
        }
    }

    public function update($id,$data)
    {

        $track=  new \App\Models\AuditTrack();$track->track(['action'=>'update restaurant user','description'=>json_encode($data->all())]);
$restaurant_users = RestaurantUsers::findOrFail($id);
       $result= $restaurant_users->update($data->all());
        if ($result) {
            Session::flash('flash_message', 'restaurant_users updated!');
            return true;
        } else {
            return false;
        }

    }


//    public function getRestaurantDriverWithOrder($data)
//    {
//
//        $oResults =  RestaurantUsers::with('users','restaurant')->join('order_driver','restaurant_users.users_id','=','order_driver.users_id')
//        ->join('order','order.id','=','order_driver.order_id');
//
//
//        if(canAccess('admin.restaurant_users.allData')){
//
//        }elseif(canAccess('admin.restaurant_users.groupData')){
//            $oResults = $oResults->whereIn('restaurant_users.restaurant_id', current_user()->getRestaurant());
//        }elseif(canAccess('admin.restaurant_users.userData')){
//            $oResults= $oResults::where('restaurant_users.users_id','=',current_user()->getUser()->id);
//        }
//
//
//        if (isset($data['date']) && !empty($data['date'])) {
//
//            $oResults = $oResults->where('order.deliver_date', '=' , $data['date']);
//        }
//
//
//        if (isset($data['users_id']) && !empty($data['users_id'])) {
//            $oResults = $oResults->where('restaurant_users.users_id', '=' , $data['users_id']);
//        }
//        if (isset($data['restaurant_id']) && !empty($data['restaurant_id'])) {
//            $oResults = $oResults->where('restaurant_users.restaurant_id', '=' , $data['restaurant_id']);
//        }
//        if (isset($data['status']) && !empty($data['status'])) {
//            $oResults = $oResults->where('order.status', '=' , $data['status']);
//        }
//
//            $oResults = $oResults->where('restaurant_users.type', '=' ,  config('array.restaurant_users_type_driver_index'));
//
//
//
//            $oResults = $oResults->orderBy('order.created_at', 'desc');
//
//
//
//
//            $oResults = $oResults->get();
//
//        return $oResults;
//    }
}
