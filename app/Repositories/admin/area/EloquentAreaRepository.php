<?php
namespace App\Repositories\admin\area;

use Session;
use App\Models\Area;
use App\Repositories\admin\area\AreaContract;

class EloquentAreaRepository implements AreaContract
{

    public function getByFilter($data)
    {

        $oResults = new Area();


        if (isset($data['id']) && !empty($data['id'])) {
            $oResults = $oResults->where('id', '=' , $data['id']);
        }
        if (isset($data['name_en']) && !empty($data['name_en'])) {
            $oResults = $oResults->where('name_en', '=' , $data['name_en']);
        }
        if (isset($data['name_ar']) && !empty($data['name_ar'])) {
            $oResults = $oResults->where('name_ar', '=' , $data['name_ar']);
        }
        if (isset($data['governorate_id']) && !empty($data['governorate_id'])) {
            $oResults = $oResults->where('governorate_id', '=' , $data['governorate_id']);
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

          $oResults = new Area();

          $oResults = $oResults->get();

$aResults=[];

foreach($oResults as $result){
$aResults[$result->id]=$result->name_en;
}
          return $aResults;
    }

    public function getAllListwithid($data=[]){

          $oResults = new Area();
          
$oResults = $oResults->where('governorate_id', '=' , $data['governorate_id']);
          $oResults = $oResults->get();

$aResults=[];

foreach($oResults as $result){
$aResults[$result->id]=$result->name_en;
}
          return $aResults;
    }
    
    public function create($data)
    {

        $result = Area::create($data);
        $track=  new \App\Models\AuditTrack();$track->track(['action'=>'Add Area','description'=>json_encode($data)]);

        if ($result) {
            Session::flash('flash_message', 'area added!');
            return true;
        } else {
            return false;
        }
    }

    public function show($id)
    {

$area = Area::findOrFail($id);

        return $area;
    }

    public function destroy($id)
    {

        $track=  new \App\Models\AuditTrack();$track->track(['action'=>'Delete Area','description'=>json_encode($this->show($id))]);
        $result =  Area::destroy($id);

        if ($result) {
            Session::flash('flash_message', 'area deleted!');
            return true;
        } else {
            return false;
        }
    }

    public function update($id,$data)
    {
$area = Area::findOrFail($id);

        $track=  new \App\Models\AuditTrack();$track->track(['action'=>'Update area','description'=>json_encode($data->all())]);
       $result= $area->update($data->all());
        if ($result) {
            Session::flash('flash_message', 'area updated!');
            return true;
        } else {
            return false;
        }

    }

}
