<?php
namespace App\Repositories\admin\banner;

use Session;
use App\Models\Banner;
use App\Repositories\admin\banner\BannerContract;

class EloquentBannerRepository implements BannerContract
{

    public function getByFilter($data)
    {

        $oResults = new Banner();

        if (isset($data['id']) && !empty($data['id'])) {
            $oResults = $oResults->where('id', '=' , $data['id']);
        }
        if (isset($data['img']) && !empty($data['img'])) {
            $oResults = $oResults->where('img', '=' , $data['img']);
        }
        if (isset($data['order']) && !empty($data['order'])) {
            $oResults = $oResults->where('order', '=' , $data['order']);
        }
        if (isset($data['status']) && !empty($data['status'])) {
            $oResults = $oResults->where('status', '=' , $data['status']);
        }
        if (isset($data['type']) && $data['type']!=='') {
            $oResults = $oResults->where('type', '=' , $data['type']);
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
            $oResults = $oResults->orderBy('order', 'asc');
        }


        if(isset($data['getAllRecords']) && !empty($data['getAllRecords'])){
             $oResults = $oResults->get();
        }
        elseif (isset($data['page_name']) && !empty($data['page_name'])) {
             $oResults = $oResults->paginate(config('deera.pagination_size'), ['*'], $data['page_name']);
        }else{
             $oResults = $oResults->paginate(config('deera.pagination_size'));
        }
        return $oResults;
    }

    public function getAllList($data=[]){

          $oResults = new Banner();

          $oResults = $oResults->get();

$aResults=[];

foreach($oResults as $result){
$aResults[$result->id]=$result->name;
}
          return $aResults;
    }

    public function create($data)
    {

        $track=  new \App\Models\AuditTrack();$track->track(['action'=>'Add banner','description'=>json_encode($data)]);
        $result = Banner::create($data);

        if ($result) {
            Session::flash('flash_message', 'banner added!');
            return true;
        } else {
            return false;
        }
    }

    public function show($id)
    {

$banner = Banner::findOrFail($id);

        return $banner;
    }

    public function destroy($id)
    {

        $track=  new \App\Models\AuditTrack();$track->track(['action'=>'Delete banner','description'=>json_encode($this->show($id))]);

        $result =  Banner::destroy($id);

        if ($result) {
            Session::flash('flash_message', 'banner deleted!');
            return true;
        } else {
            return false;
        }
    }

    public function update($id,$data)
    {
$banner = Banner::findOrFail($id);

        $track=  new \App\Models\AuditTrack();$track->track(['action'=>'Update banner','description'=>json_encode($data->all())]);

       $result= $banner->update($data->all());
        if ($result) {
            Session::flash('flash_message', 'banner updated!');
            return true;
        } else {
            return false;
        }

    }

}
