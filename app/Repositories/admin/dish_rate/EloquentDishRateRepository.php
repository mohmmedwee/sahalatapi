<?php
namespace App\Repositories\admin\dish_rate;

use Session;
use App\Models\DishRate;
use App\Repositories\admin\dish_rate\DishRateContract;

class EloquentDishRateRepository implements DishRateContract
{

    public function getByFilter($data)
    {

        $oResults = new DishRate();




        if(canAccess('admin.dish.allData')) {

        }elseif(canAccess('admin.dish.groupData')){
            $oResults=$oResults->select('dish_rate.*')->join('dish','dish_rate.dish_id','=','dish.id')
                ->whereIn('dish.restaurant_id', current_user()->getRestaurant());
        }elseif(canAccess('admin.dish.userData')){

        }else{return [];}


        if (isset($data['id']) && !empty($data['id'])) {
            $oResults = $oResults->where('id', '=' , $data['id']);
        }
        if (isset($data['users_id']) && !empty($data['users_id'])) {
            $oResults = $oResults->where('users_id', '=' , $data['users_id']);
        }
        if (isset($data['dish_id']) && !empty($data['dish_id'])) {
            $oResults = $oResults->where('dish_id', '=' , $data['dish_id']);
        }
        if (isset($data['rate']) && $data['rate'] !=='') {
            $oResults = $oResults->where('rate', '=' , $data['rate']);
        }
        if (isset($data['description']) && !empty($data['description'])) {
            $oResults = $oResults->where('description', 'like' , '%'.$data['description'].'%');
        }
        if (isset($data['status']) && $data['status']!=='') {
            $oResults = $oResults->where('status', '=' , $data['status']);
        }
        if (isset($data['notification']) && $data['notification']!=='') {
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

          $oResults = new DishRate();

          $oResults = $oResults->get();

$aResults=[];

foreach($oResults as $result){
$aResults[$result->id]=$result->name;
}
          return $aResults;
    }

    public function create($data)
    {

        $result = DishRate::create($data);

        if ($result) {
            Session::flash('flash_message', 'dish_rate added!');
            return true;
        } else {
            return false;
        }
    }

    public function show($id)
    {

$dish_rate = DishRate::findOrFail($id);


        DishRate::find($id)->update(['notification'=>1]);
        return $dish_rate;
    }

    public function destroy($id)
    {

        $result =  DishRate::destroy($id);

        if ($result) {
            Session::flash('flash_message', 'dish_rate deleted!');
            return true;
        } else {
            return false;
        }
    }

    public function update($id,$data)
    {
$dish_rate = DishRate::findOrFail($id);
       $result= $dish_rate->update(is_array($data)? $data:$data->all());
        if ($result) {
            Session::flash('flash_message', 'dish_rate updated!');
            return true;
        } else {
            return false;
        }

    }

}
