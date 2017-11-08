<?php
namespace App\Repositories\admin\cms;

use Session;
use App\Models\Cms;
use App\Repositories\admin\cms\CmsContract;

class EloquentCmsRepository implements CmsContract
{

    public function getByFilter($data)
    {

        $oResults = new Cms();

        if (isset($data['id']) && !empty($data['id'])) {
            $oResults = $oResults->where('id', '=' , $data['id']);
        }
        if (isset($data['title_en']) && !empty($data['title_en'])) {
            $oResults = $oResults->where('title_en', '=' , $data['title_en']);
        }
        if (isset($data['title_ar']) && !empty($data['title_ar'])) {
            $oResults = $oResults->where('title_ar', '=' , $data['title_ar']);
        }
        if (isset($data['alias']) && !empty($data['alias'])) {
            $oResults = $oResults->where('alias', '=' , $data['alias']);
        }
        if (isset($data['content_en']) && !empty($data['content_en'])) {
            $oResults = $oResults->where('content_en', '=' , $data['content_en']);
        }
        if (isset($data['content_ar']) && !empty($data['content_ar'])) {
            $oResults = $oResults->where('content_ar', '=' , $data['content_ar']);
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

          $oResults = new Cms();

          $oResults = $oResults->get();

$aResults=[];

foreach($oResults as $result){
$aResults[$result->id]=$result->name;
}
          return $aResults;
    }

    public function create($data)
    {

        $track=  new \App\Models\AuditTrack();$track->track(['action'=>'Add CMS','description'=>json_encode($data)]);
        $result = Cms::create($data);

        if ($result) {
            Session::flash('flash_message', 'cms added!');
            return true;
        } else {
            return false;
        }
    }

    public function show($id)
    {

$cms = Cms::findOrFail($id);

        return $cms;
    }

    public function destroy($id)
    {

        $track=  new \App\Models\AuditTrack();$track->track(['action'=>'Delete CMS','description'=>json_encode($this->show($id))]);
        $result =  Cms::destroy($id);

        if ($result) {
            Session::flash('flash_message', 'cms deleted!');
            return true;
        } else {
            return false;
        }
    }

    public function update($id,$data)
    {

        $track=  new \App\Models\AuditTrack();$track->track(['action'=>'Update CMS','description'=>json_encode($data->all())]);
$cms = Cms::findOrFail($id);
       $result= $cms->update($data->all());
        if ($result) {
            Session::flash('flash_message', 'cms updated!');
            return true;
        } else {
            return false;
        }

    }

}
