<?php
namespace App\Repositories\website\dish;

use Session;
use App\Models\Dish;
use App\Repositories\website\dish\DishContract;

class EloquentDishRepository implements DishContract
{

    public function getByFilter($data)
    {

        $oResults = new Dish();



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
        if (isset($data['cuisine_id']) && !empty($data['cuisine_id'])) {
            $oResults = $oResults->where('cuisine_id', '=' , $data['cuisine_id']);
        }
        if (isset($data['menu_section_id']) && !empty($data['menu_section_id'])) {
            $oResults = $oResults->where('menu_section_id', '=' , $data['menu_section_id']);
        }
        if (isset($data['category_id']) && !empty($data['category_id'])) {
            $oResults = $oResults->where('category_id', '=' , $data['category_id']);
        }
        if (isset($data['delivery_menu_id']) && !empty($data['delivery_menu_id'])) {
            $oResults = $oResults->where('delivery_menu_id', '=' , $data['delivery_menu_id']);
        }
        if (isset($data['parent_id']) && !empty($data['parent_id'])) {
            $oResults = $oResults->where('parent_id', '=' , $data['parent_id']);
        }
        if (isset($data['price']) && !empty($data['price'])) {
            $oResults = $oResults->where('price', '=' , $data['price']);
        }
        if (isset($data['quantity']) && !empty($data['quantity'])) {
            $oResults = $oResults->where('quantity', '=' , $data['quantity']);
        }
        if (isset($data['img']) && !empty($data['img'])) {
            $oResults = $oResults->where('img', '=' , $data['img']);
        }
        if (isset($data['discount']) && !empty($data['discount'])) {
            $oResults = $oResults->where('discount', '=' , $data['discount']);
        }
        if (isset($data['available_from']) && !empty($data['available_from'])) {
            $oResults = $oResults->where('available_from', '=' , $data['available_from']);
        }
        if (isset($data['available_to']) && !empty($data['available_to'])) {
            $oResults = $oResults->where('available_to', '=' , $data['available_to']);
        }
        if (isset($data['description_en']) && !empty($data['description_en'])) {
            $oResults = $oResults->where('description_en', '=' , $data['description_en']);
        }
        if (isset($data['description_ar']) && !empty($data['description_ar'])) {
            $oResults = $oResults->where('description_ar', '=' , $data['description_ar']);
        }
        if (isset($data['status']) && !empty($data['status'])) {
            $oResults = $oResults->where('status', '=' , $data['status']);
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

        if (isset($data['type']) && $data['type'] =='bestseller') {
          $oResults = $oResults->where('dish.best_seller', '>' , 0)->orderByRaw('RAND()');
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

          $oResults = new Dish();

          $oResults = $oResults->get();

$aResults=[];

foreach($oResults as $result){
$aResults[$result->id]=$result->name;
}
          return $aResults;
    }

    public function create($data)
    {

        $result = Dish::create($data);

        if ($result) {
            Session::flash('flash_message', 'dish added!');
            return true;
        } else {
            return false;
        }
    }

    public function show($id)
    {

$dish = Dish::findOrFail($id);

        return $dish;
    }

    public function destroy($id)
    {

        $result =  Dish::destroy($id);

        if ($result) {
            Session::flash('flash_message', 'dish deleted!');
            return true;
        } else {
            return false;
        }
    }

    public function update($id,$data)
    {
$dish = Dish::findOrFail($id);
       $result= $dish->update($data->all());
        if ($result) {
            Session::flash('flash_message', 'dish updated!');
            return true;
        } else {
            return false;
        }

    }


    function getMostSellingDish($data=[])
    {


        $oResults = \Illuminate\Support\Facades\DB::table('dish')
            ->join('cart', 'cart.dish_id','=','dish.id')
            ->join('restaurant', 'restaurant.id','=','dish.restaurant_id')
            ->select(['dish.*','restaurant.name_en as restaurant_name_en','restaurant.name_ar as restaurant_name_ar',\Illuminate\Support\Facades\DB::raw('count(cart.dish_id) as orderNumber')])
            ->groupBy('cart.dish_id')->orderBy('orderNumber','desc');


            $oResults = $oResults->orderBy('dish.id', 'desc');



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




public function betselling(){

      $oDishs = \Illuminate\Support\Facades\DB::table('dish');
      $best=$oDishs->where('bestseller','>', 0)->get();

      return $best;
}




}
