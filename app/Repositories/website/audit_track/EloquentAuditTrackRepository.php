<?php
namespace App\Repositories\website\audit_track;

use Session;
use App\Models\AuditTrack;
use App\Repositories\website\audit_track\AuditTrackContract;

class EloquentAuditTrackRepository implements AuditTrackContract
{

    public function getByFilter($data)
    {

        $oResults = new AuditTrack();

        if (isset($data['id']) && !empty($data['id'])) {
            $oResults = $oResults->where('id', '=' , $data['id']);
        }
        if (isset($data['users_id']) && !empty($data['users_id'])) {
            $oResults = $oResults->where('users_id', '=' , $data['users_id']);
        }
        if (isset($data['action']) && !empty($data['action'])) {
            $oResults = $oResults->where('action', '=' , $data['action']);
        }
        if (isset($data['users_name']) && !empty($data['users_name'])) {
            $oResults = $oResults->where('users_name', '=' , $data['users_name']);
        }
        if (isset($data['users_role']) && !empty($data['users_role'])) {
            $oResults = $oResults->where('users_role', '=' , $data['users_role']);
        }
        if (isset($data['description']) && !empty($data['description'])) {
            $oResults = $oResults->where('description', '=' , $data['description']);
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

          $oResults = new AuditTrack();

          $oResults = $oResults->get();

$aResults=[];

foreach($oResults as $result){
$aResults[$result->id]=$result->name;
}
          return $aResults;
    }

    public function create($data)
    {

        $result = AuditTrack::create($data);

        if ($result) {
            Session::flash('flash_message', 'audit_track added!');
            return true;
        } else {
            return false;
        }
    }

    public function show($id)
    {

$audit_track = AuditTrack::findOrFail($id);

        return $audit_track;
    }

    public function destroy($id)
    {

        $result =  AuditTrack::destroy($id);

        if ($result) {
            Session::flash('flash_message', 'audit_track deleted!');
            return true;
        } else {
            return false;
        }
    }

    public function update($id,$data)
    {
$audit_track = AuditTrack::findOrFail($id);
       $result= $audit_track->update($data->all());
        if ($result) {
            Session::flash('flash_message', 'audit_track updated!');
            return true;
        } else {
            return false;
        }

    }

}
