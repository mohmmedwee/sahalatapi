<?php
namespace App\Repositories\admin\service;

use Session;
use App\Models\Service;

use App\Repositories\admin\service\ServiceContract;

class EloquentServiceRepository implements ServiceContract
{
    public function getByFilter($data)
    {


        $oResults = new Service();


//        if (canAccess('admin.service.allData')) {
//
//        } elseif (canAccess('admin.service.groupData')) {
//            $oResults = $oResults->where('users_id', '=', current_user()->getUser()->id);
//        } elseif (canAccess('admin.service.userData')) {
//
//        } else {
//            return;
//        }

        if (isset($data['id']) && !empty($data['id'])) {
            $oResults = $oResults->where('id', '=', $data['id']);
        }
        if (isset($data['name_en']) && !empty($data['name_en'])) {
            $oResults = $oResults->where('name_en', '=', $data['name_en']);
        }
        if (isset($data['name_ar']) && !empty($data['name_ar'])) {
            $oResults = $oResults->where('name_ar', '=', $data['name_ar']);
        }
        if (isset($data['order']) && !empty($data['order'])) {
            $sort = (isset($data['sort']) && !empty($data['sort'])) ? $data['sort'] : 'desc';
            $oResults = $oResults->orderBy($data['order'], $sort);
        } else {
            $oResults = $oResults->orderBy('id', 'desc');
        }


        if (isset($data['getAllRecords']) && !empty($data['getAllRecords'])) {
            $oResults = $oResults->get();
        } elseif (isset($data['page_name']) && !empty($data['page_name'])) {
            $oResults = $oResults->paginate(config('sahalat.pagination_size'), ['*'], $data['page_name']);
        } else {
            $oResults = $oResults->paginate(config('sahalat.pagination_size'));
        }
        return $oResults;
    }

    public function getAllList($data = [])
    {


        $oResults = new Service();

        $oResults = $oResults->get();

        $aResults = [];

        foreach ($oResults as $result) {
            $aResults[$result->id] = $result->name_en;
        }
        return $aResults;
    }

    public function create($data)
    {

        $result = Service::create($data);

        if ($result) {
            Session::flash('flash_message', 'service added!');
            return true;
        } else {
            return false;

        }
    }

    public function show($id)
    {

        $service = Service::findOrFail($id);

        return $service;
    }

    public function destroy($id)
    {

        $result = Service::destroy($id);

        if ($result) {
            Session::flash('flash_message', 'service deleted!');
            return true;
        } else {
            return false;
        }
    }

    public function update($id, $data)
    {
        $service = Service::findOrFail($id);
        $result = $service->update(is_array($data) ? $data : $data->all());
        if ($result) {
            Session::flash('flash_message', 'service updated!');
            return true;
        } else {
            return false;
        }

    }

}
