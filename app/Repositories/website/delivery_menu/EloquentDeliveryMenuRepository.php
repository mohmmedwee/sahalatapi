<?php
namespace App\Repositories\website\delivery_menu;

use Session;
use App\Models\DeliveryMenu;
use App\Repositories\website\delivery_menu\DeliveryMenuContract;

class EloquentDeliveryMenuRepository implements DeliveryMenuContract
{

    public function getByFilter($data)
    {

        $oResults = new DeliveryMenu();

        if (isset($data['id']) && !empty($data['id'])) {
            $oResults = $oResults->where('id', '=' , $data['id']);
        }
        if (isset($data['name_en']) && !empty($data['name_en'])) {
            $oResults = $oResults->where('name_en', '=' , $data['name_en']);
        }
        if (isset($data['name_ar']) && !empty($data['name_ar'])) {
            $oResults = $oResults->where('name_ar', '=' , $data['name_ar']);
        }
        if (isset($data['restaurant_id']) && !empty($data['restaurant_id'])) {
            $oResults = $oResults->where('restaurant_id', '=' , $data['restaurant_id']);
        }
        if (isset($data['status']) && !empty($data['status'])) {
            $oResults = $oResults->where('status', '=' , $data['status']);
        }
        if (isset($data['description_en']) && !empty($data['description_en'])) {
            $oResults = $oResults->where('description_en', '=' , $data['description_en']);
        }
        if (isset($data['description_ar']) && !empty($data['description_ar'])) {
            $oResults = $oResults->where('description_ar', '=' , $data['description_ar']);
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

          $oResults = new DeliveryMenu();

          $oResults = $oResults->get();

$aResults=[];

foreach($oResults as $result){
$aResults[$result->id]=$result->name;
}
          return $aResults;
    }

    public function create($data)
    {

        $result = DeliveryMenu::create($data);

        if ($result) {
            Session::flash('flash_message', 'delivery_menu added!');
            return true;
        } else {
            return false;
        }
    }

    public function show($id)
    {

$delivery_menu = DeliveryMenu::findOrFail($id);

        return $delivery_menu;
    }

    public function destroy($id)
    {

        $result =  DeliveryMenu::destroy($id);

        if ($result) {
            Session::flash('flash_message', 'delivery_menu deleted!');
            return true;
        } else {
            return false;
        }
    }

    public function update($id,$data)
    {
$delivery_menu = DeliveryMenu::findOrFail($id);
       $result= $delivery_menu->update($data->all());
        if ($result) {
            Session::flash('flash_message', 'delivery_menu updated!');
            return true;
        } else {
            return false;
        }

    }

}
