<?php
namespace App\Repositories\admin\restaurant_rate;

use Session;
use App\Models\RestaurantRate;
use App\Repositories\admin\restaurant_rate\RestaurantRateContract;

class EloquentRestaurantRateRepository implements RestaurantRateContract
{

    public function getByFilter($data)
    {

        $oResults = new RestaurantRate();


        if(canAccess('admin.restaurant.allData')) {

        }elseif(canAccess('admin.restaurant.groupData')){
            $oResults = $oResults->whereIn('restaurant_id',  current_user()->getRestaurant());
        }elseif(canAccess('admin.restaurant.userData')){

        }else{return [];}

        if (isset($data['id']) && !empty($data['id'])) {
            $oResults = $oResults->where('id', '=' , $data['id']);
        }
        if (isset($data['users_id']) && !empty($data['users_id'])) {
            $oResults = $oResults->where('users_id', '=' , $data['users_id']);
        }
        if (isset($data['restaurant_id']) && !empty($data['restaurant_id'])) {
            $oResults = $oResults->where('restaurant_id', '=' , $data['restaurant_id']);
        }
        if (isset($data['rate']) &&  $data['rate'] !=='') {
            $oResults = $oResults->where('rate', '=' , $data['rate']);
        }
        if (isset($data['description']) && !empty($data['description'])) {
            $oResults = $oResults->where('description', 'like' , '%'.$data['description'].'%');
        }
        if (isset($data['status']) &&  $data['status']!=='') {
            $oResults = $oResults->where('status', '=' , $data['status']);
        }
        if (isset($data['notification']) &&  $data['notification']!=='') {
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

    public function getAllList($data=[]){

          $oResults = new RestaurantRate();

        if(canAccess('admin.restaurant.allData')) {

        }elseif(canAccess('admin.restaurant.groupData')){
            $oResults = $oResults->whereIn('restaurant_id',  current_user()->getRestaurant());
        }elseif(canAccess('admin.restaurant.userData')){

        }else{return[];}
          $oResults = $oResults->get();

$aResults=[];

foreach($oResults as $result){
$aResults[$result->id]=$result->name;
}
          return $aResults;
    }

    public function create($data)
    {

        $result = RestaurantRate::create($data);

        if ($result) {
            Session::flash('flash_message', 'restaurant_rate added!');
            return true;
        } else {
            return false;
        }
    }

    public function show($id)
    {

$restaurant_rate = RestaurantRate::findOrFail($id);

        RestaurantRate::find($id)->update(['notification'=>1]);
        return $restaurant_rate;
    }

    public function destroy($id)
    {

        $result =  RestaurantRate::destroy($id);

        if ($result) {
            Session::flash('flash_message', 'restaurant_rate deleted!');
            return true;
        } else {
            return false;
        }
    }

    public function update($id,$data)
    {
$restaurant_rate = RestaurantRate::findOrFail($id);
       $result= $restaurant_rate->update(is_array($data)? $data:$data->all());
        if ($result) {
            Session::flash('flash_message', 'restaurant_rate updated!');
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
                $sheet->setAllBorders('thin');
            });

        }, 'UTF-8')->export(($request->exportExcel =='pdf')?'pdf':'xls');
    }


 public function AreaResturantToArray($oResults){
        $aResults=[['id','Users','Restaurant Name','Rate']];

        if(count($oResults)){

            foreach($oResults as $oResult){
                $aResults[]=[
                    $oResult->id ,
                    (isset($oResult->users->first_name))?$oResult->users->first_name:'' ,
                     isset($oResult->restaurant()->first()->name_en)? $oResult->restaurant()->first()->name_en:'' ,
                     $oResult->rate,
                    

                ];




            }
        }
        return $aResults;
    }














}
