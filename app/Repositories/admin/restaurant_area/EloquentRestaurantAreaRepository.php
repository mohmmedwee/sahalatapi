<?php
namespace App\Repositories\admin\restaurant_area;

use Session;
use App\Models\RestaurantArea;
use App\Repositories\admin\restaurant_area\RestaurantAreaContract;

class EloquentRestaurantAreaRepository implements RestaurantAreaContract
{

    public function getByFilter($data)
    {

        $oResults = new RestaurantArea();

        if(canAccess('admin.restaurant.allData')) {

        }elseif(canAccess('admin.restaurant.groupData')){
            $oResults = $oResults->whereIn('restaurant_id',  current_user()->getRestaurant());
        }elseif(canAccess('admin.restaurant.userData')){

        }else{return;}


        if (isset($data['id']) && !empty($data['id'])) {
            $oResults = $oResults->where('id', '=' , $data['id']);
        }
        if (isset($data['area_id']) && !empty($data['area_id'])) {
            $oResults = $oResults->where('area_id', '=' , $data['area_id']);
        }
        if (isset($data['restaurant_id']) && !empty($data['restaurant_id'])) {
            $oResults = $oResults->where('restaurant_id', '=' , $data['restaurant_id']);
        }
        if (isset($data['delivery_charges']) && !empty($data['delivery_charges'])) {
            $oResults = $oResults->where('delivery_charges', '=' , $data['delivery_charges']);
        }
        if (isset($data['sahalat_charge']) && !empty($data['sahalat_charge'])) {
            $oResults = $oResults->where('sahalat_charge', '=' , $data['sahalat_charge']);
        }
        if (isset($data['min_amount']) && !empty($data['min_amount'])) {
            $oResults = $oResults->where('min_amount', '=' , $data['min_amount']);
        }
        if (isset($data['deliver_time_from']) && !empty($data['deliver_time_from'])) {
            $oResults = $oResults->where('deliver_time_from', '=' , $data['deliver_time_from']);
        }
        if (isset($data['deliver_time_to']) && !empty($data['deliver_time_to'])) {
            $oResults = $oResults->where('deliver_time_to', '=' , $data['deliver_time_to']);
        }
        if (isset($data['status']) && !empty($data['status'])) {
            $oResults = $oResults->where('status', '=' , $data['status']);
        }
        if (isset($data['governorate_id']) && !empty($data['governorate_id'])) {
            $oResults = $oResults->where('governorate_id', '=' , $data['governorate_id']);
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

    
    public function getAllListwithid($data = []) {

        $oResults = new Area();

        $oResults = $oResults->where('governorate_id', '=', $data['governorate_id']);
        $oResults = $oResults->get();

        $aResults = [];

        foreach ($oResults as $result) {
            $aResults[$result->id] = $result->name_en;
        }
        return $aResults;
    }


    public function getAllList($data=[]){

          $oResults = new RestaurantArea();


        if(canAccess('admin.restaurant.allData')) {

        }elseif(canAccess('admin.restaurant.groupData')){
            $oResults = $oResults->whereIn('restaurant_id',  current_user()->getRestaurant());
        }elseif(canAccess('admin.restaurant.userData')){

        }else{return [];}


        $oResults = $oResults->get();

$aResults=[];

foreach($oResults as $result){
$aResults[$result->id]=$result->area->name_en;
}
          return $aResults;
    }

    public function create($data)
    {

        $result = RestaurantArea::create($data);

        if ($result) {
            Session::flash('flash_message', 'restaurant_area added!');
            return true;
        } else {
            return false;
        }
    }

    public function show($id)
    {

$restaurant_area = RestaurantArea::findOrFail($id);

        return $restaurant_area;
    }

    public function destroy($id)
    {

        $result =  RestaurantArea::destroy($id);

        if ($result) {
            Session::flash('flash_message', 'restaurant_area deleted!');
            return true;
        } else {
            return false;
        }
    }

    public function update($id,$data)
    {
$restaurant_area = RestaurantArea::findOrFail($id);
       $result= $restaurant_area->update($data->all());
        if ($result) {
            Session::flash('flash_message', 'restaurant_area updated!');
            return true;
        } else {
            return false;
        }











    }












   public function exportAreaResturant($request){

        if(!isset($request->exportExcel)){return false;}

        $request->merge(['getAllRecords'=>1]);
        $oResults=$this->getByFilter($request);

        $excelData=$this->AreaResturantToArray($oResults);

    ob_end_clean();

    ob_start();
        \Excel::create('RestaurantArea', function($excel) use($excelData) {

            $excel->sheet('Excel sheet', function($sheet) use($excelData) {

                $sheet->fromArray($excelData);
                $sheet->setOrientation('landscape');

            });

        })->export(($request->exportExcel =='pdf')?'pdf':'xls');
    }


 public function AreaResturantToArray($oResults){
        $aResults=[['id','area_id','restaurant_id','delivery_charges','sahalat_charge']];

        if(count($oResults)){

            foreach($oResults as $oResult){
                $aResults[]=[
                    $oResult->id ,
                    (isset($oResult->area->name_en))?$oResult->area->name_en:'' ,
                     isset($oResult->restaurant()->first()->name_en)? $oResult->restaurant()->first()->name_en:'' ,
                     $oResult->delivery_charges ,
                     $oResult->sahalat_charge ,
                    

                ];




            }
        }
        return $aResults;
    }








}
