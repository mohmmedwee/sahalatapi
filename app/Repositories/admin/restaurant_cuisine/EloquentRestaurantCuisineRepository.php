<?php
namespace App\Repositories\admin\restaurant_cuisine;

use Session;
use App\Models\RestaurantCuisine;
use App\Repositories\admin\restaurant_cuisine\RestaurantCuisineContract;

class EloquentRestaurantCuisineRepository implements RestaurantCuisineContract
{

    public function getByFilter($data)
    {

        $oResults = new RestaurantCuisine();

        if(canAccess('admin.restaurant.allData')) {

        }elseif(canAccess('admin.restaurant.groupData')){
            $oResults = $oResults->whereIn('restaurant_id',  current_user()->getRestaurant());
        }elseif(canAccess('admin.restaurant.userData')){

        }else{return;}



        if (isset($data['id']) && !empty($data['id'])) {
            $oResults = $oResults->where('id', '=' , $data['id']);
        }
        if (isset($data['restaurant_id']) && !empty($data['restaurant_id'])) {
            $oResults = $oResults->where('restaurant_id', '=' , $data['restaurant_id']);
        }
        if (isset($data['cuisine_id']) && !empty($data['cuisine_id'])) {
            $oResults = $oResults->where('cuisine_id', '=' , $data['cuisine_id']);
        }
        if (isset($data['order']) && !empty($data['order'])) {
            $sort = (isset($data['sort']) && !empty($data['sort'])) ? $data['sort'] : 'desc';
            $oResults = $oResults->orderBy($data['order'], $sort);
        }else{
            $oResults = $oResults->orderBy('id', 'desc');
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

          $oResults = new RestaurantCuisine();


        if(canAccess('admin.restaurant.allData')) {

        }elseif(canAccess('admin.restaurant.groupData')){
            $oResults = $oResults->whereIn('restaurant_id',  current_user()->getRestaurant());
        }elseif(canAccess('admin.restaurant.userData')){

        }else{return;}
          $oResults = $oResults->get();

$aResults=[];

foreach($oResults as $result){
$aResults[$result->id]=$result->name;
}
          return $aResults;
    }

    public function create($data)
    {

        $track=  new \App\Models\AuditTrack();$track->track(['action'=>'Add area to restaurant','description'=>json_encode($data)]);
        $result = RestaurantCuisine::create($data);

        if ($result) {
            Session::flash('flash_message', 'restaurant_cuisine added!');
            return true;
        } else {
            return false;
        }
    }

    public function show($id)
    {

$restaurant_cuisine = RestaurantCuisine::findOrFail($id);

        return $restaurant_cuisine;
    }

    public function destroy($id)
    {

        $track=  new \App\Models\AuditTrack();$track->track(['action'=>'delete restaurant cuisine','description'=>json_encode($this->show($id))]);
        $result =  RestaurantCuisine::destroy($id);

        if ($result) {
            Session::flash('flash_message', 'restaurant_cuisine deleted!');
            return true;
        } else {
            return false;
        }
    }

    public function update($id,$data)
    {

        $track=  new \App\Models\AuditTrack();$track->track(['action'=>'Update restaurant cuisine','description'=>json_encode($data->all())]);

$restaurant_cuisine = RestaurantCuisine::findOrFail($id);
       $result= $restaurant_cuisine->update($data->all());
        if ($result) {
            Session::flash('flash_message', 'restaurant_cuisine updated!');
            return true;
        } else {
            return false;
        }

    }



   public function exportRestaurantcuisine($request){

        if(!isset($request->exportExcel)){return false;}

        $request->merge(['getAllRecords'=>1]);
        $oResults=$this->getByFilter($request);

        $excelData=$this->RestaurantcuisineToArray($oResults);

        ob_end_clean();
        ob_start();
        \Excel::create('Best Restaurant', function($excel) use($excelData) {

            $excel->sheet('Excel sheet', function($sheet) use($excelData) {

                $sheet->fromArray($excelData);
                $sheet->setOrientation('landscape');
                $sheet->setAllBorders('thin');
            });

        })->export(($request->exportExcel =='pdf')?'pdf':'xls');
    }


 public function RestaurantcuisineToArray($oResults){

    
        $aResults=[['id','Restaurant',' cuisine name']];

        if(count($oResults)){

            foreach($oResults as $oResult){
                $aResults[]=[
                    $oResult->id ,
                   $oResult->restaurant->name_en,
                    $oResult->cuisine->name_en,
                 
                ];

            }
        }

        return $aResults;
    }













}
