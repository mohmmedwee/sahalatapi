<?php
namespace App\Repositories\website\category;

use Session;
use App\Models\Category;
use App\Repositories\website\category\CategoryContract;

class EloquentCategoryRepository implements CategoryContract
{

    public function getByFilter($data)
    {

        $oResults = new Category();

        if (isset($data['id']) && !empty($data['id'])) {
            $oResults = $oResults->where('id', '=' , $data['id']);
        }
        if (isset($data['name_en']) && !empty($data['name_en'])) {
            $oResults = $oResults->where('name_en', '=' , $data['name_en']);
        }
        if (isset($data['name_ar']) && !empty($data['name_ar'])) {
            $oResults = $oResults->where('name_ar', '=' , $data['name_ar']);
        }
        if (isset($data['min_quantity']) && !empty($data['min_quantity'])) {
            $oResults = $oResults->where('min_quantity', '=' , $data['min_quantity']);
        }
        if (isset($data['max_quantity']) && !empty($data['max_quantity'])) {
            $oResults = $oResults->where('max_quantity', '=' , $data['max_quantity']);
        }
        if (isset($data['restaurant_id']) && !empty($data['restaurant_id'])) {
            $oResults = $oResults->where('restaurant_id', '=' , $data['restaurant_id']);
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

          $oResults = new Category();

          $oResults = $oResults->get();

$aResults=[];

foreach($oResults as $result){
$aResults[$result->id]=$result->name;
}
          return $aResults;
    }

    public function create($data)
    {

        $result = Category::create($data);

        if ($result) {
            Session::flash('flash_message', 'category added!');
            return true;
        } else {
            return false;
        }
    }

    public function show($id)
    {

$category = Category::findOrFail($id);

        return $category;
    }

    public function destroy($id)
    {

        $result =  Category::destroy($id);

        if ($result) {
            Session::flash('flash_message', 'category deleted!');
            return true;
        } else {
            return false;
        }
    }

    public function update($id,$data)
    {
$category = Category::findOrFail($id);
       $result= $category->update($data->all());
        if ($result) {
            Session::flash('flash_message', 'category updated!');
            return true;
        } else {
            return false;
        }

    }

}
