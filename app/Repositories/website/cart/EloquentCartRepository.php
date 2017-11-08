<?php
namespace App\Repositories\website\cart;

use Session;
use App\Models\Cart;
use App\Repositories\website\cart\CartContract;

class EloquentCartRepository implements CartContract
{

    public function getByFilter($data)
    {

        $oResults = new Cart();

        if (isset($data['id']) && !empty($data['id'])) {
            $oResults = $oResults->where('id', '=' , $data['id']);
        }
        if (isset($data['users_id']) && !empty($data['users_id'])) {
            $oResults = $oResults->where('users_id', '=' , $data['users_id']);
        }
        if (isset($data['restaurant_id']) && !empty($data['restaurant_id'])) {
            $oResults = $oResults->where('restaurant_id', '=' , $data['restaurant_id']);
        }
        if (isset($data['dish_id']) && !empty($data['dish_id'])) {
            $oResults = $oResults->where('dish_id', '=' , $data['dish_id']);
        }
        if (isset($data['order_id']) && !empty($data['order_id'])) {
            $oResults = $oResults->where('order_id', '=' , $data['order_id']);
        }
        if (isset($data['deliver_charge']) && !empty($data['deliver_charge'])) {
            $oResults = $oResults->where('deliver_charge', '=' , $data['deliver_charge']);
        }
        if (isset($data['quantity']) && !empty($data['quantity'])) {
            $oResults = $oResults->where('quantity', '=' , $data['quantity']);
        }
        if (isset($data['unit_price']) && !empty($data['unit_price'])) {
            $oResults = $oResults->where('unit_price', '=' , $data['unit_price']);
        }
        if (isset($data['total_price']) && !empty($data['total_price'])) {
            $oResults = $oResults->where('total_price', '=' , $data['total_price']);
        }
        if (isset($data['special_request']) && !empty($data['special_request'])) {
            $oResults = $oResults->where('special_request', '=' , $data['special_request']);
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

          $oResults = new Cart();

          $oResults = $oResults->get();

$aResults=[];

foreach($oResults as $result){
$aResults[$result->id]=$result->name;
}
          return $aResults;
    }

    public function create($data)
    {

        $result = Cart::create($data);

        if ($result) {
            Session::flash('flash_message', 'cart added!');
            return true;
        } else {
            return false;
        }
    }

    public function show($id)
    {

$cart = Cart::findOrFail($id);

        return $cart;
    }

    public function destroy($id)
    {

        $result =  Cart::destroy($id);

        if ($result) {
            Session::flash('flash_message', 'cart deleted!');
            return true;
        } else {
            return false;
        }
    }

    public function update($id,$data)
    {
$cart = Cart::findOrFail($id);
       $result= $cart->update($data->all());
        if ($result) {
            Session::flash('flash_message', 'cart updated!');
            return true;
        } else {
            return false;
        }

    }

}
