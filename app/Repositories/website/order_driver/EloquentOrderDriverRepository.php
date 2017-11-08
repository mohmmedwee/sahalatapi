<?php
namespace App\Repositories\website\order_driver;

use Session;
use App\Models\OrderDriver;
use App\Repositories\website\order_driver\OrderDriverContract;

class EloquentOrderDriverRepository implements OrderDriverContract
{

    public function getByFilter($data)
    {

        $oResults = new OrderDriver();

        if (isset($data['id']) && !empty($data['id'])) {
            $oResults = $oResults->where('id', '=', $data['id']);
        }
        if (isset($data['users_id']) && !empty($data['users_id'])) {
            $oResults = $oResults->where('users_id', '=', $data['users_id']);
        }
        if (isset($data['order_id']) && !empty($data['order_id'])) {
            $oResults = $oResults->where('order_id', '=', $data['order_id']);
        }
        if (isset($data['current_long']) && !empty($data['current_long'])) {
            $oResults = $oResults->where('current_long', '=', $data['current_long']);
        }
        if (isset($data['current_lat']) && !empty($data['current_lat'])) {
            $oResults = $oResults->where('current_lat', '=', $data['current_lat']);
        }
        if (isset($data['status']) && !empty($data['status'])) {
            $oResults = $oResults->where('status', '=', $data['status']);
        }
        if (isset($data['note']) && !empty($data['note'])) {
            $oResults = $oResults->where('note', '=', $data['note']);
        }
        if (isset($data['notification']) && !empty($data['notification'])) {
            $oResults = $oResults->where('notification', '=', $data['notification']);
        }
        if (isset($data['created_at']) && !empty($data['created_at'])) {
            $oResults = $oResults->where('created_at', '=', $data['created_at']);
        }
        if (isset($data['updated_at']) && !empty($data['updated_at'])) {
            $oResults = $oResults->where('updated_at', '=', $data['updated_at']);
        }
        if (isset($data['order']) && !empty($data['order'])) {
            $sort = (isset($data['sort']) && !empty($data['sort'])) ? $data['sort'] : 'desc';
            $oResults = $oResults->orderBy($data['order'], $sort);
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

        $oResults = new OrderDriver();

        $oResults = $oResults->get();

        $aResults = [];

        foreach ($oResults as $result) {
            $aResults[$result->id] = $result->name;
        }
        return $aResults;
    }

    public function create($data)
    {

        $result = OrderDriver::create($data);

        if ($result) {
            Session::flash('flash_message', 'order_driver added!');
            return true;
        } else {
            return false;
        }
    }

    public function show($id)
    {

        $order_driver = OrderDriver::findOrFail($id);

        return $order_driver;
    }

    public function destroy($id)
    {

        $result = OrderDriver::destroy($id);

        if ($result) {
            Session::flash('flash_message', 'order_driver deleted!');
            return true;
        } else {
            return false;
        }
    }

    public function update($id, $data)
    {
        $order_driver = OrderDriver::findOrFail($id);
        $result = $order_driver->update($data->all());
        if ($result) {
            Session::flash('flash_message', 'order_driver updated!');
            return true;
        } else {
            return false;
        }

    }

}
