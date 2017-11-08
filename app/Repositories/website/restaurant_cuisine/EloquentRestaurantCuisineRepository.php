<?php
namespace App\Repositories\website\restaurant_cuisine;

use Session;
use App\Models\RestaurantCuisine;
use App\Repositories\website\restaurant_cuisine\RestaurantCuisineContract;

class EloquentRestaurantCuisineRepository implements RestaurantCuisineContract
{

    public function getByFilter($data)
    {

        $oResults = new RestaurantCuisine();

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

          $oResults = $oResults->get();

$aResults=[];

foreach($oResults as $result){
$aResults[$result->id]=$result->name;
}
          return $aResults;
    }

    public function create($data)
    {

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
$restaurant_cuisine = RestaurantCuisine::findOrFail($id);
       $result= $restaurant_cuisine->update($data->all());
        if ($result) {
            Session::flash('flash_message', 'restaurant_cuisine updated!');
            return true;
        } else {
            return false;
        }

    }

}
