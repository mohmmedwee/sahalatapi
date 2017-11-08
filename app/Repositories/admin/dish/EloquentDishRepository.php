<?php
namespace App\Repositories\admin\dish;

use DB,Session;
use App\Models\Dish;
use App\Repositories\admin\dish\DishContract;

class EloquentDishRepository implements DishContract
{

    public function getByFilter($data)
    {

        $oResults = new Dish();

        if(canAccess('admin.dish.allData')) {

        }elseif(canAccess('admin.dish.groupData')){
            $oResults = $oResults->whereIn('dish.restaurant_id', current_user()->getRestaurant());
        }elseif(canAccess('admin.dish.userData')){

        }else{return [];}



        if (isset($data['id']) && !empty($data['id'])) {
            $oResults = $oResults->where('dish.id', '=' , $data['id']);
        }
        if (isset($data['name_en']) && !empty($data['name_en'])) {
            $oResults = $oResults->where('dish.name_en', '=' , $data['name_en']);
        }
        if (isset($data['name_ar']) && !empty($data['name_ar'])) {
            $oResults = $oResults->where('dish.name_ar', '=' , $data['name_ar']);
        }
        if (isset($data['restaurant_id']) && !empty($data['restaurant_id'])) {
            $oResults = $oResults->where('dish.restaurant_id', '=' , $data['restaurant_id']);
        }
        if (isset($data['cuisine_id']) && !empty($data['cuisine_id'])) {
            $oResults = $oResults->where('dish.cuisine_id', '=' , $data['cuisine_id']);
        }
        if (isset($data['menu_section_id']) && !empty($data['menu_section_id'])) {
            $oResults = $oResults->where('dish.menu_section_id', '=' , $data['menu_section_id']);
        }
        if (isset($data['category_id']) && !empty($data['category_id'])) {
            $oResults = $oResults->where('dish.category_id', '=' , $data['category_id']);
        }
        if (isset($data['delivery_menu_id']) && !empty($data['delivery_menu_id'])) {
            $oResults = $oResults->where('dish.delivery_menu_id', '=' , $data['delivery_menu_id']);
        }
        if (isset($data['parent_id']) && !empty($data['parent_id'])) {
            $oResults = $oResults->where('dish.parent_id', '=' , $data['parent_id']);
        }
        if (isset($data['price']) && !empty($data['price'])) {
            $oResults = $oResults->where('dish.price', '=' , $data['price']);
        }
        if (isset($data['quantity']) && !empty($data['quantity'])) {
            $oResults = $oResults->where('dish.quantity', '=' , $data['quantity']);
        }
        if (isset($data['img']) && !empty($data['img'])) {
            $oResults = $oResults->where('dish.img', '=' , $data['img']);
        }
        if (isset($data['discount']) && !empty($data['discount'])) {
            $oResults = $oResults->where('dish.discount', '=' , $data['discount']);
        }
        if (isset($data['available_from']) && !empty($data['available_from'])) {
            $oResults = $oResults->where('dish.available_from', '=' , $data['available_from']);
        }
        if (isset($data['available_to']) && !empty($data['available_to'])) {
            $oResults = $oResults->where('dish.available_to', '=' , $data['available_to']);
        }
        if (isset($data['description_en']) && !empty($data['description_en'])) {
            $oResults = $oResults->where('dish.description_en', '=' , $data['description_en']);
        }
        if (isset($data['description_ar']) && !empty($data['description_ar'])) {
            $oResults = $oResults->where('dish.description_ar', '=' , $data['description_ar']);
        }
        if (isset($data['status']) && !empty($data['status'])) {
            $oResults = $oResults->where('dish.status', '=' , $data['status']);
        }
        if (isset($data['created_at']) && !empty($data['created_at'])) {
            $oResults = $oResults->where('dish.created_at', '=' , $data['created_at']);
        }
        if (isset($data['updated_at']) && !empty($data['updated_at'])) {
            $oResults = $oResults->where('dish.updated_at', '=' , $data['updated_at']);
        }


        if (isset($data['best']) && !empty($data['best'])) {
            $oResults=$oResults->leftJoin('cart','dish.id','=','cart.dish_id');
            $oResults = $oResults->select(['dish.*',DB::raw('count(cart.id) as order_number')])->groupBy('cart.dish_id')->orderBy('order_number','desc');
        }

        if (isset($data['order']) && !empty($data['order'])) {
            $sort = (isset($data['sort']) && !empty($data['sort'])) ? $data['sort'] : 'desc';
            $oResults = $oResults->orderBy('dish.'.$data['order'], $sort);
        }else{
            $oResults = $oResults->orderBy('dish.updated_at', 'desc');
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

        if(canAccess('admin.dish.allData')) {

        }elseif(canAccess('admin.dish.groupData')){
            $oResults = $oResults->whereIn('restaurant_id', current_user()->getRestaurant());
        }elseif(canAccess('admin.dish.userData')){

        }else{return [];}



        $oResults = $oResults->get();

$aResults=[];

foreach($oResults as $result){
$aResults[$result->id]=$result->name_en;
}
          return $aResults;
    }

    public function create($data)
    {

        $track=  new \App\Models\AuditTrack();$track->track(['action'=>'Add Dish','description'=>json_encode($data)]);

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

        $track=  new \App\Models\AuditTrack();$track->track(['action'=>'Delete Dish','description'=>json_encode($this->show($id))]);
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

        $track=  new \App\Models\AuditTrack();$track->track(['action'=>'Update Dish','description'=>json_encode($data->all())]);
$dish = Dish::findOrFail($id);
       $result= $dish->update($data->all());
        if ($result) {
            Session::flash('flash_message', 'dish updated!');
            return true;
        } else {
            return false;
        }

    }
    


   public function exportbestDish($request){

        if(!isset($request->exportExcel)){return false;}

        $request->merge(['getAllRecords'=>1]);
        $oResults=$this->getByFilter($request);

        $excelData=$this->bestDishToArray($oResults);

        ob_end_clean();
        ob_start();
        \Excel::create('Best Dishs ', function($excel) use($excelData) {

            $excel->sheet('Excel sheet', function($sheet) use($excelData) {

                $sheet->fromArray($excelData);
                $sheet->setOrientation('landscape');
                $sheet->setAllBorders('thin');


            });

        })->export(($request->exportExcel =='pdf')?'pdf':'xls');
    }


 public function bestDishToArray($oResults){

    
       if (isset($data['best']) && !empty($data['best'])) {
            $oResults=$oResults->leftJoin('cart','dish.id','=','cart.dish_id');
            $oResults = $oResults->select(['dish.*',DB::raw('count(cart.id) as order_number')])->groupBy('cart.dish_id')->orderBy('order_number','desc');
        }

        $aResults=[['ID','Dish Name','Price','Order Number','Restaurant Name','Quantity']];

        if(count($oResults)){

            foreach($oResults as $oResult){
                $aResults[]=[
                    $oResult->id ,
                    $oResult->name_en,
                   $oResult->price,
                $oResult->order_number, 
                $oResult->restaurant->name_en, 
                $oResult->quantity,   
                ];

            }
        }

        return $aResults;
    }

















}
