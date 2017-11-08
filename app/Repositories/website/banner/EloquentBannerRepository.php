<?php
namespace App\Repositories\website\banner;

use Session;
use App\Models\Banner;
use App\Repositories\website\banner\BannerContract;

class EloquentBannerRepository implements BannerContract
{

    public function getByFilter($data)
    {

        $oResults = new Banner();

$currentDate=gmdate('Y-m-d');
        $oResults = $oResults->where('status', '=' , config('array.banner_status_enable_index'));

        $oResults = $oResults->where('available_from', '<=' ,$currentDate);
        $oResults = $oResults->where('available_to', '>=' ,$currentDate);

        if (isset($data['id']) && !empty($data['id'])) {
            $oResults = $oResults->where('id', '=' , $data['id']);
        }
        if (isset($data['img']) && !empty($data['img'])) {
            $oResults = $oResults->where('img', '=' , $data['img']);
        }
        if (isset($data['order']) && !empty($data['order'])) {
            $oResults = $oResults->where('order', '=' , $data['order']);
        }
        if (isset($data['type']) && $data['type']!=='') {
            $oResults = $oResults->where('type', '=' , $data['type']);
        }
        if (isset($data['default']) && $data['default']!=='') {
            $oResults = $oResults->where('default', '=' , $data['default']);
        }
//        if (isset($data['status']) && !empty($data['status'])) {
//            $oResults = $oResults->where('status', '=' , $data['status']);
//        }
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
        if (isset($data['status']) && !empty($data['status'])) {
            $oResults = $oResults->where('status', '=' , $data['status']);
        }

          $oResults = $oResults->lists('img','id');


          return $oResults;
    }

    public function create($data)
    {

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
       $result= $banner->update($data->all());
        if ($result) {
            Session::flash('flash_message', 'banner updated!');
            return true;
        } else {
            return false;
        }

    }

}
