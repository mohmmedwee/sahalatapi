<?php
namespace App\Repositories\admin\governorate;

use Session;
use App\Models\Governorate;
use App\Repositories\admin\governorate\GovernorateContract;

class EloquentGovernorateRepository implements GovernorateContract
{

    public function getByFilter($data)
    {

        $oResults = new Governorate();

        if (isset($data['id']) && !empty($data['id'])) {
            $oResults = $oResults->where('id', '=' , $data['id']);
        }
        if (isset($data['name_en']) && !empty($data['name_en'])) {
            $oResults = $oResults->where('name_en', '=' , $data['name_en']);
        }
        if (isset($data['name_ar']) && !empty($data['name_ar'])) {
            $oResults = $oResults->where('name_ar', '=' , $data['name_ar']);
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

          $oResults = new Governorate();

          $oResults = $oResults->get();

$aResults=[];

foreach($oResults as $result){
$aResults[$result->id]=$result->name_en;
}
          return $aResults;
    }

    public function create($data)
    {

        $result = Governorate::create($data);

        if ($result) {
            Session::flash('flash_message', 'governorate added!');
            return true;
        } else {
            return false;
        }
    }

    public function show($id)
    {

$governorate = Governorate::findOrFail($id);

        return $governorate;
    }

    public function destroy($id)
    {

        $result =  Governorate::destroy($id);

        if ($result) {
            Session::flash('flash_message', 'governorate deleted!');
            return true;
        } else {
            return false;
        }
    }

    public function update($id,$data)
    {
$governorate = Governorate::findOrFail($id);
       $result= $governorate->update($data->all());
        if ($result) {
            Session::flash('flash_message', 'governorate updated!');
            return true;
        } else {
            return false;
        }

    }

}
