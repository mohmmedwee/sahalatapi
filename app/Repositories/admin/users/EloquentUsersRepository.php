<?php
namespace App\Repositories\admin\users;

use Session;
use App\Models\Users;
use App\Repositories\admin\users\UsersContract;

class EloquentUsersRepository implements UsersContract
{

    public function getByFilter($data)
    {

        $oResults = new Users();

        if (isset($data['id']) && !empty($data['id'])) {
            $oResults = $oResults->where('id', '=' , $data['id']);
        }
        if (isset($data['first_name']) && !empty($data['first_name'])) {
            $oResults = $oResults->where('first_name', '=' , $data['first_name']);
        }
        if (isset($data['last_name']) && !empty($data['last_name'])) {
            $oResults = $oResults->where('last_name', '=' , $data['last_name']);
        }
        if (isset($data['email']) && !empty($data['email'])) {
            $oResults = $oResults->where('email', '=' , $data['email']);
        }
        if (isset($data['password']) && !empty($data['password'])) {
            $oResults = $oResults->where('password', '=' , $data['password']);
        }
        if (isset($data['mobile']) && !empty($data['mobile'])) {
            $oResults = $oResults->where('mobile', '=' , $data['mobile']);
        }
        if (isset($data['mobile_company']) && !empty($data['mobile_company'])) {
            $oResults = $oResults->where('mobile_company', '=' , $data['mobile_company']);
        }
        if (isset($data['phone']) && !empty($data['phone'])) {
            $oResults = $oResults->where('phone', '=' , $data['phone']);
        }
        if (isset($data['gender']) && !empty($data['gender'])) {
            $oResults = $oResults->where('gender', '=' , $data['gender']);
        }
        if (isset($data['occupation']) && !empty($data['occupation'])) {
            $oResults = $oResults->where('occupation', '=' , $data['occupation']);
        }
        if (isset($data['session_id']) && !empty($data['session_id'])) {
            $oResults = $oResults->where('session_id', '=' , $data['session_id']);
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

    public function getAllList($data = [])
    {

        $oResults = new Users();

        $oResults = $oResults->get();

        $aResults = [];

        foreach ($oResults as $result) {
            $aResults[$result->id] = $result->first_name;
        }
        return $aResults;
    }




    public function create($data)
    {

        $result = Users::create($data);

        if ($result) {
            Session::flash('flash_message', 'users added!');
            return true;
        } else {
            return false;
        }
    }

    public function show($id)
    {

$users = Users::findOrFail($id);

        return $users;
    }

    public function destroy($id)
    {

        $result =  Users::destroy($id);

        if ($result) {
            Session::flash('flash_message', 'users deleted!');
            return true;
        } else {
            return false;
        }
    }

    public function update($id,$data)
    {
$users = Users::findOrFail($id);
       $result= $users->update($data->all());
        if ($result) {
            Session::flash('flash_message', 'users updated!');
            return true;
        } else {
            return false;
        }

    }

}
