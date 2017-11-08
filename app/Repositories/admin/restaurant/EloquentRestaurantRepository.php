<?php
namespace App\Repositories\admin\restaurant;

use DB,Session;
use App\Models\Restaurant;
use App\Repositories\admin\restaurant\RestaurantContract;

class EloquentRestaurantRepository implements RestaurantContract
{


    public function getByFilter($data,&$statistic=[])
    {

        $oResults =  Restaurant::with('branch');


        /* todo authorize users*/

        if(canAccess('admin.restaurant.allData')) {

        }elseif(canAccess('admin.restaurant.groupData')){
            $oResults = $oResults->whereIn('restaurant.id',  current_user()->getRestaurant());
        }elseif(canAccess('admin.restaurant.userData')){

        }else{return;}



        if (isset($data['id']) && !empty($data['id'])) {
            $oResults = $oResults->where('restaurant.id', '=' , $data['id']);
        }
        if (isset($data['name_en']) && !empty($data['name_en'])) {
            $oResults = $oResults->where('restaurant.name_en', 'like' , '%'.$data['name_en'].'%');
        }
        if (isset($data['name_ar']) && !empty($data['name_ar'])) {
            $oResults = $oResults->where('restaurant.name_ar', 'like' , '%'.$data['name_ar'].'%');
        }
        if (isset($data['Owner_first_name']) && !empty($data['Owner_first_name'])) {
            $oResults = $oResults->where('restaurant.Owner_first_name',  'like' , '%'.$data['Owner_first_name'].'%');
        }
        if (isset($data['Owner_last_name']) && !empty($data['Owner_last_name'])) {
            $oResults = $oResults->where('restaurant.Owner_last_name', 'like' , '%'.$data['Owner_last_name'].'%');
        }
        if (isset($data['email']) && !empty($data['email'])) {
            $oResults = $oResults->where('restaurant.email',  'like' , '%'.$data['email'].'%');
        }
        if (isset($data['available_payment']) && !empty($data['available_payment'])) {
            $oResults = $oResults->where('restaurant.available_payment', '=' , $data['available_payment']);
        }
        if (isset($data['telephone']) && !empty($data['telephone'])) {
            $oResults = $oResults->where('restaurant.telephone',  'like' , '%'. $data['telephone'].'%');
        }
        if (isset($data['status']) &&  $data['status']!=='') {
            $oResults = $oResults->where('restaurant.status', '=' , $data['status']);
        }
        if (isset($data['min_amount']) && !empty($data['min_amount'])) {
            $oResults = $oResults->where('restaurant.min_amount', '=' , $data['min_amount']);
        }
        if (isset($data['working_hour_from']) && !empty($data['working_hour_from'])) {
            $oResults = $oResults->where('restaurant.working_hour_from', '=' , $data['working_hour_from']);
        }
        if (isset($data['working_hour_to']) && !empty($data['working_hour_to'])) {
            $oResults = $oResults->where('restaurant.working_hour_to', '=' , $data['working_hour_to']);
        }
        if (isset($data['deliver_time_from']) && !empty($data['deliver_time_from'])) {
            $oResults = $oResults->where('restaurant.deliver_time_from', '=' , $data['deliver_time_from']);
        }
        if (isset($data['deliver_time_to']) && !empty($data['deliver_time_to'])) {
            $oResults = $oResults->where('restaurant.deliver_time_to', '=' , $data['deliver_time_to']);
        }
        if (isset($data['deliver_charge']) && !empty($data['deliver_charge'])) {
            $oResults = $oResults->where('restaurant.deliver_charge', '=' , $data['deliver_charge']);
        }
        if (isset($data['rating']) && !empty($data['rating'])) {
            $oResults = $oResults->where('restaurant.rating', '=' , $data['rating']);
        }
        if (isset($data['show_menu']) &&  $data['show_menu'] !=='') {
            $oResults = $oResults->where('restaurant.show_menu', '=' , $data['show_menu']);
        }
        if (isset($data['order_accept_days']) && !empty($data['order_accept_days'])) {
            $oResults = $oResults->where('restaurant.order_accept_days', '=' , $data['order_accept_days']);
        }
        if (isset($data['offline_order']) && $data['offline_order'] !=='') {
            $oResults = $oResults->where('restaurant.offline_order', '=' , $data['offline_order']);
        }
        if (isset($data['url']) && !empty($data['url'])) {
            $oResults = $oResults->where('restaurant.url',  'like' , '%'. $data['url'].'%');
        }
        if (isset($data['img']) && !empty($data['img'])) {
            $oResults = $oResults->where('restaurant.img',  'like' , '%'.$data['img'].'%');
        }
        if (isset($data['commission_type']) &&  $data['commission_type'] !=='') {
            $oResults = $oResults->where('restaurant.commission_type', '=' , $data['commission_type']);
        }
        if (isset($data['discount_type']) &&  $data['discount_type'] !=='') {
            $oResults = $oResults->where('restaurant.discount_type', '=' , $data['discount_type']);
        }
        if (isset($data['discount']) && !empty($data['discount'])) {
            $oResults = $oResults->where('restaurant.discount', '=' , $data['discount']);
        }
        if (isset($data['area_id']) && !empty($data['area_id'])) {
            $oResults = $oResults->where('restaurant.area_id', '=' , $data['area_id']);
        }
        if (isset($data['follow_us']) && $data['follow_us']!== '' ) {
            $oResults = $oResults->where('restaurant.follow_us', '=' , $data['follow_us']);
        }
        if (isset($data['notification']) && $data['notification']!== '') {
            $oResults = $oResults->where('restaurant.notification', '=' , $data['notification']);
        }
        if (isset($data['address_en']) && !empty($data['address_en'])) {
            $oResults = $oResults->where('restaurant.address_en',  'like' , '%'. $data['address_en'].'%');
        }
        if (isset($data['address_ar']) && !empty($data['address_ar'])) {
            $oResults = $oResults->where('restaurant.address_ar',  'like' , '%'.$data['address_ar'].'%');
        }
        if (isset($data['description_en']) && !empty($data['description_en'])) {
            $oResults = $oResults->where('restaurant.description_en',  'like' , '%'. $data['description_en'].'%');
        }
        if (isset($data['description_ar']) && !empty($data['description_ar'])) {
            $oResults = $oResults->where('restaurant.description_ar',  'like' , '%'.$data['description_ar'].'%');
        }
        if (isset($data['summary_en']) && !empty($data['summary_en'])) {
            $oResults = $oResults->where('restaurant.summary_en',  'like' , '%'. $data['summary_en'].'%');
        }
        if (isset($data['summary_ar']) && !empty($data['summary_ar'])) {
            $oResults = $oResults->where('restaurant.summary_ar',  'like' , '%'. $data['summary_ar'].'%');
        }
        if (isset($data['created_at']) && !empty($data['created_at'])) {
            $oResults = $oResults->where('restaurant.created_at', '=' , $data['created_at']);
        }
        if (isset($data['updated_at']) && !empty($data['updated_at'])) {
            $oResults = $oResults->where('restaurant.updated_at', '=' , $data['updated_at']);
        }

        if (isset($data['bestRestaurant']) && !empty($data['bestRestaurant'])) {
            $oResults=$oResults->leftJoin('order','restaurant.id','=','order.restaurant_id');
            $oResults = $oResults->select(['restaurant.*',DB::raw('count(order.id) as order_number')])->groupBy('order.restaurant_id')->orderBy('order_number','desc');
        }

        if (isset($data['newRestaurant']) ) {
            $sort = (isset($data['sort']) && !empty($data['sort'])) ? $data['sort'] : 'desc';
            $oResults = $oResults->orderBy('restaurant.created_at', $sort);
        }elseif (isset($data['order']) && !empty($data['order'])) {
            $sort = (isset($data['sort']) && !empty($data['sort'])) ? $data['sort'] : 'desc';
            $oResults = $oResults->orderBy('restaurant.'.$data['order'], $sort);
        }else{
            $oResults = $oResults->orderBy('restaurant.updated_at', 'desc');
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

        $oResults = new Restaurant();

        if(canAccess('admin.restaurant.allData')) {

        }elseif(canAccess('admin.restaurant.groupData')){
            $oResults = $oResults->whereIn('id',  current_user()->getRestaurant());
        }elseif(canAccess('admin.restaurant.userData')){

        }else{return [];}

        if (isset($data['branch']) && $data['branch']!== '') {
            $oResults = $oResults->where('branch', '=' , $data['branch']);
        }
        $oResults = $oResults->get();

        $aResults=[];

        foreach($oResults as $result){
            $aResults[$result->id]=$result->name_en;
        }
        return $aResults;
    }

    public function create($data)
    {

        $track=  new \App\Models\AuditTrack();$track->track(['action'=>'Add Restaurant','description'=>json_encode($data)]);
        $result = Restaurant::create($data);

        if ($result) {
            Session::flash('flash_message', 'restaurant added!');
            return true;
        } else {
            return false;
        }
    }

    public function show($id)
    {

        $restaurant = new Restaurant();

        if (canAccess('admin.restaurant.allData')) {

        } elseif (canAccess('admin.restaurant.groupData')) {
            $restaurant = $restaurant->whereIn('id', current_user()->getRestaurant());
        } elseif (canAccess('admin.restaurant.userData')) {

        } else {
            return;
        }

        $restaurant = $restaurant->where('id', '=', $id)->first();

        Restaurant::find($id)->update(['notification' => 1]);
        return $restaurant;
    }

    public function destroy($id)
    {

        $track=  new \App\Models\AuditTrack();$track->track(['action'=>'delete restaurant','description'=>json_encode($this->show($id))]);
        $result =  Restaurant::destroy($id);

        if ($result) {
            Session::flash('flash_message', 'restaurant deleted!');
            return true;
        } else {
            return false;
        }
    }

    public function update($id,$data)
    {

        $track=  new \App\Models\AuditTrack();$track->track(['action'=>'Update Restaurant','description'=>json_encode(is_array($data)? $data:$data->all())]);
        $restaurant = Restaurant::findOrFail($id);
        $result= $restaurant->update(is_array($data)? $data:$data->all());
        if ($result) {
            Session::flash('flash_message', 'restaurant updated!');
            return true;
        } else {
            return false;
        }

    }












   public function exportbestRestaurant($request){

        if(!isset($request->exportExcel)){return false;}

        $request->merge(['getAllRecords'=>1]);
        $oResults=$this->getByFilter($request);

        $excelData=$this->BestRestaurantToArray($oResults);

    ob_end_clean();
    ob_start();
        \Excel::create('Best Restaurant', function($excel) use($excelData) {

            $excel->sheet('Excel sheet', function($sheet) use($excelData) {

                $sheet->fromArray($excelData);
                $sheet->setOrientation('landscape');

            });

        })->export(($request->exportExcel =='pdf')?'pdf':'xls');
    }


 public function BestRestaurantToArray($oResults){

          if (isset($data['bestRestaurant']) && !empty($data['bestRestaurant'])) {
            $oResults=$oResults->leftJoin('order','restaurant.id','=','order.restaurant_id');
            $oResults = $oResults->select(['restaurant.*',DB::raw('count(order.id) as order_number')])->groupBy('order.restaurant_id')->orderBy('order_number','desc');
        }

        $aResults=[['id','name_en']];

        if(count($oResults)){

            foreach($oResults as $oResult){
                $aResults[]=[
                    $oResult->id ,
                    (isset($oResult->name_en))?$oResult->name_en:'' ,           

                ];

            }
        }

        return $aResults;
    }



















}
