<?php
namespace App\Repositories\admin\contact_us;

use Session;
use App\Models\ContactUs;
use App\Repositories\admin\contact_us\ContactUsContract;

class EloquentContactUsRepository implements ContactUsContract
{

    public function getByFilter($data)
    {

        $oResults = new ContactUs();

        if (isset($data['id']) && !empty($data['id'])) {
            $oResults = $oResults->where('id', '=' , $data['id']);
        }
        if (isset($data['users_id']) && !empty($data['users_id'])) {
            $oResults = $oResults->where('users_id', '=' , $data['users_id']);
        }
        if (isset($data['email']) && !empty($data['email'])) {
            $oResults = $oResults->where('email', '=' , $data['email']);
        }
        if (isset($data['phone']) && !empty($data['phone'])) {
            $oResults = $oResults->where('phone', '=' , $data['phone']);
        }
        if (isset($data['comments']) && !empty($data['comments'])) {
            $oResults = $oResults->where('comments', '=' , $data['comments']);
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

          $oResults = new ContactUs();

          $oResults = $oResults->get();

$aResults=[];

foreach($oResults as $result){
$aResults[$result->id]=$result->name;
}
          return $aResults;
    }

    public function create($data)
    {

        $result = ContactUs::create($data);

        if ($result) {
            Session::flash('flash_message', 'contact_us added!');
            return true;
        } else {
            return false;
        }
    }

    public function show($id)
    {

$contact_us = ContactUs::findOrFail($id);

        return $contact_us;
    }

    public function destroy($id)
    {

        $result =  ContactUs::destroy($id);

        if ($result) {
            Session::flash('flash_message', 'contact_us deleted!');
            return true;
        } else {
            return false;
        }
    }

    public function update($id,$data)
    {
$contact_us = ContactUs::findOrFail($id);
       $result= $contact_us->update($data->all());
        if ($result) {
            Session::flash('flash_message', 'contact_us updated!');
            return true;
        } else {
            return false;
        }

    }

}
