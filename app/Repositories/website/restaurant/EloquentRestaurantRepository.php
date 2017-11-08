<?php
namespace App\Repositories\website\restaurant;

use Session;
use App\Models\Restaurant;
use App\Models\RestaurantCuisine as mRestaurantCuisine;
use App\Repositories\website\restaurant\RestaurantContract;

class EloquentRestaurantRepository implements RestaurantContract
{


    public function getByFilter($data)
    {

        $oResults = new Restaurant();

        if (isset($data['id']) && !empty($data['id'])) {
            $oResults = $oResults->where('restaurant.id', '=' , $data['id']);
        }
        if (isset($data['name_en']) && !empty($data['name_en'])) {
            $oResults = $oResults->where(function($query) use ($data){
                $query->where('restaurant.name_en', 'like' , '%'.$data['name_en'].'%');
                $query->orWhere('restaurant.name_ar', 'like' , '%'.$data['name_en'].'%');
            });
        }
        if (isset($data['name_ar']) && !empty($data['name_ar'])) {
            $oResults = $oResults->where('restaurant.name_ar', 'like' , '%'.$data['name_ar'].'%');
        }
        if (isset($data['Owner_first_name']) && !empty($data['Owner_first_name'])) {
            $oResults = $oResults->where('restaurant.Owner_first_name', '=' , $data['Owner_first_name']);
        }
        if (isset($data['Owner_last_name']) && !empty($data['Owner_last_name'])) {
            $oResults = $oResults->where('restaurant.Owner_last_name', '=' , $data['Owner_last_name']);
        }
        if (isset($data['email']) && !empty($data['email'])) {
            $oResults = $oResults->where('restaurant.email', '=' , $data['email']);
        }
        if (isset($data['available_payment']) && !empty($data['available_payment'])) {
            $oResults = $oResults->where('restaurant.available_payment', '=' , $data['available_payment']);
        }
        if (isset($data['telephone']) && !empty($data['telephone'])) {
            $oResults = $oResults->where('restaurant.telephone', '=' , $data['telephone']);
        }

        $oResults = $oResults->where('restaurant.status', '!=' ,config('array.restaurant_status_pending_index'));
        if (isset($data['status']) && !empty($data['status'])) {
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
        if (isset($data['show_menu']) && !empty($data['show_menu'])) {
            $oResults = $oResults->where('restaurant.show_menu', '=' , $data['show_menu']);
        }
        if (isset($data['order_accept_days']) && !empty($data['order_accept_days'])) {
            $oResults = $oResults->where('restaurant.order_accept_days', '=' , $data['order_accept_days']);
        }
        if (isset($data['offline_order']) && !empty($data['offline_order'])) {
            $oResults = $oResults->where('restaurant.offline_order', '=' , $data['offline_order']);
        }
        if (isset($data['url']) && !empty($data['url'])) {
            $oResults = $oResults->where('restaurant.url', '=' , $data['url']);
        }
        if (isset($data['img']) && !empty($data['img'])) {
            $oResults = $oResults->where('restaurant.img', '=' , $data['img']);
        }
        if (isset($data['commission_type']) && !empty($data['commission_type'])) {
            $oResults = $oResults->where('restaurant.commission_type', '=' , $data['commission_type']);
        }
        if (isset($data['discount_type']) && !empty($data['discount_type'])) {
            $oResults = $oResults->where('restaurant.discount_type', '=' , $data['discount_type']);
        }
        if (isset($data['discount']) && !empty($data['discount'])) {
            $oResults = $oResults->where('restaurant.discount', '=' , $data['discount']);
        }
        if (isset($data['area_id']) && !empty($data['area_id'])) {
            $oResults = $oResults->where('restaurant.area_id', '=' , $data['area_id']);
        }
        if (isset($data['cuisine_id']) && !empty($data['cuisine_id'])) {
            $aRestaurantIds=mRestaurantCuisine::where('cuisine_id',$data['cuisine_id'])->lists('restaurant_id','restaurant_id');
            $oResults = $oResults->whereIn('restaurant.id',  $aRestaurantIds);
        }
        if (isset($data['follow_us']) && !empty($data['follow_us'])) {
            $oResults = $oResults->where('restaurant.follow_us', '=' , $data['follow_us']);
        }
        if (isset($data['notification']) && !empty($data['notification'])) {
            $oResults = $oResults->where('restaurant.notification', '=' , $data['notification']);
        }
        if (isset($data['address_en']) && !empty($data['address_en'])) {
            $oResults = $oResults->where('restaurant.address_en', '=' , $data['address_en']);
        }
        if (isset($data['address_ar']) && !empty($data['address_ar'])) {
            $oResults = $oResults->where('restaurant.address_ar', '=' , $data['address_ar']);
        }
        if (isset($data['description_en']) && !empty($data['description_en'])) {
            $oResults = $oResults->where('restaurant.description_en', '=' , $data['description_en']);
        }
        if (isset($data['description_ar']) && !empty($data['description_ar'])) {
            $oResults = $oResults->where('restaurant.description_ar', '=' , $data['description_ar']);
        }
        if (isset($data['summary_en']) && !empty($data['summary_en'])) {
            $oResults = $oResults->where('restaurant.summary_en', '=' , $data['summary_en']);
        }
        if (isset($data['summary_ar']) && !empty($data['summary_ar'])) {
            $oResults = $oResults->where('restaurant.summary_ar', '=' , $data['summary_ar']);
        }
        if (isset($data['created_at']) && !empty($data['created_at'])) {
            $oResults = $oResults->where('restaurant.created_at', '=' , $data['created_at']);
        }
        if (isset($data['updated_at']) && !empty($data['updated_at'])) {
            $oResults = $oResults->where('restaurant.updated_at', '=' , $data['updated_at']);
        }


        if (isset($data['bestRestaurant']) && !empty($data['bestRestaurant'])) {

            $oResults = $oResults->join('dish','dish.restaurant_id','=','restaurant.id')
            ->select(['restaurant.*',\DB::raw('count(dish.id) as best_seller')])
            ->groupBy('dish.restaurant_id')
            ->where('dish.best_seller','>', 0);
        }


        if (isset($data['bestRestaurant']) && !empty($data['bestRestaurant'])) {

            $oResults = $oResults->orderBy('best_seller', 'desc');
        }else if (isset($data['order']) && !empty($data['order'])) {
            $sort = (isset($data['sort']) && !empty($data['sort'])) ? $data['sort'] : 'desc';
            $oResults = $oResults->orderBy('restaurant.'.$data['order'], $sort);
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

        $oResults = $oResults->where('restaurant.status', '!=' ,config('array.restaurant_status_pending_index'));
          $oResults = $oResults->get();

$aResults=[];

foreach($oResults as $result){
$aResults[$result->id]=$result->name_en;
}
          return $aResults;
    }

    public function create($data)
    {

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

$restaurant = Restaurant::findOrFail($id);

        return $restaurant;
    }

    public function destroy($id)
    {

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
$restaurant = Restaurant::findOrFail($id);
       $result= $restaurant->update(is_array($data)?$data:$data->all());
        if ($result) {
            Session::flash('flash_message', 'restaurant updated!');
            return true;
        } else {
            return false;
        }

    }


    public function getFooterPopularRestaurantMenu()
    {

        $oRestaurants = \Illuminate\Support\Facades\DB::table('restaurant')
            ->join('order', 'restaurant.id','=','order.restaurant_id')
            ->select(['restaurant.id','restaurant.name_'.config('app.locale'),\Illuminate\Support\Facades\DB::raw('count(restaurant.id) as orderNumber')])
            ->where('restaurant.status', '!=' ,config('array.restaurant_status_pending_index'))
            ->groupBy('order.restaurant_id')->orderBy('orderNumber','desc')->limit(5)->get();



        $restaurants=[];
        foreach($oRestaurants as $oRestaurant){
            $restaurants[$oRestaurant->id]=$oRestaurant->{'name_'.config('app.locale')};
        }
        return $restaurants;
    }

    public function getFooterPopularAreaMenu()
    {

        $oAreas = \Illuminate\Support\Facades\DB::table('area')
            ->join('order', 'area.id','=','order.area_id')
            ->select(['area.id','area.name_'.config('app.locale'),\Illuminate\Support\Facades\DB::raw('count(area.id) as orderNumber')])
            ->groupBy('order.area_id')->orderBy('orderNumber','desc')->limit(5)->get();



        $areas=[];
        foreach($oAreas as $oArea){
            $areas[$oArea->id]=$oArea->{'name_'.config('app.locale')};
        }
        return $areas;
    }


   public function getFooterPopularCuisineMenu()
    {

        $oCuisines = \Illuminate\Support\Facades\DB::table('cuisine')
            ->join('restaurant_cuisine', 'cuisine.id','=','restaurant_cuisine.cuisine_id')
            ->join('order', 'order.restaurant_id','=','restaurant_cuisine.restaurant_id')
            ->select(['cuisine.id','cuisine.name_'.config('app.locale'),\Illuminate\Support\Facades\DB::raw('count(cuisine.id) as orderNumber')])

       ->where('cuisine.status', '=' ,config('array.cuisine_status_show_index'))
            ->groupBy('order.restaurant_id')->orderBy('orderNumber','desc')->limit(5)->get();



        $cuisines=[];
        foreach($oCuisines as $oCuisine){
            $cuisines[$oCuisine->id]=$oCuisine->{'name_'.config('app.locale')};
        }
        return $cuisines;
    }

    public function getMostSellingDishes($restaurnat_id=0){

        $oDishes = \Illuminate\Support\Facades\DB::table('dish')
            ->join('cart', 'cart.dish_id','=','dish.id')
            ->join('order', 'cart.order_id','=','order.id');

        if($restaurnat_id > 0){
            $oDishes=   $oDishes->where('order.restaurant_id','=',$restaurnat_id);
        }
        $oDishes=$oDishes->select(['dish.id as dish_id','dish.name_'.config('app.locale'),\Illuminate\Support\Facades\DB::raw('sum(cart.quantity) as orderNumber')])
            ->groupBy('cart.dish_id')->orderBy('orderNumber','desc')->limit(8)->get();


        $aDishes=[];
        foreach($oDishes as $oDish){
            $aDishes[$oDish->dish_id]=$oDish->{'name_'.config('app.locale')};
        }
        return $aDishes;



    }








}
