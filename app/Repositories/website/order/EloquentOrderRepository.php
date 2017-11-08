<?php
namespace App\Repositories\website\order;

use Session;
use App\Models\Order;
use App\Repositories\website\order\OrderContract;

class EloquentOrderRepository implements OrderContract
{

    public function getByFilter($data)
    {

        $oResults = new Order();

        if (isset($data['id']) && !empty($data['id'])) {
            $oResults = $oResults->where('id', '=', $data['id']);
        }
        if (isset($data['users_id']) && !empty($data['users_id'])) {
            $oResults = $oResults->where('users_id', '=', $data['users_id']);
        }
        if (isset($data['restaurant_id']) && !empty($data['restaurant_id'])) {
            $oResults = $oResults->where('restaurant_id', '=', $data['restaurant_id']);
        }
        if (isset($data['area_id']) && !empty($data['area_id'])) {
            $oResults = $oResults->where('area_id', '=', $data['area_id']);
        }
        if (isset($data['from_id']) && !empty($data['from_id'])) {
            $oResults = $oResults->where('from_id', '=', $data['from_id']);
        }
        if (isset($data['address_id']) && !empty($data['address_id'])) {
            $oResults = $oResults->where('address_id', '=', $data['address_id']);
        }
        if (isset($data['order_time']) && !empty($data['order_time'])) {
            $oResults = $oResults->where('order_time', '=', $data['order_time']);
        }
        if (isset($data['deliver_time']) && !empty($data['deliver_time'])) {
            $oResults = $oResults->where('deliver_time', '=', $data['deliver_time']);
        }
        if (isset($data['deliver_date']) && !empty($data['deliver_date'])) {
            $oResults = $oResults->where('deliver_date', '=', $data['deliver_date']);
        }
        if (isset($data['note']) && !empty($data['note'])) {
            $oResults = $oResults->where('note', '=', $data['note']);
        }
        if (isset($data['deliver_charge']) && !empty($data['deliver_charge'])) {
            $oResults = $oResults->where('deliver_charge', '=', $data['deliver_charge']);
        }
        if (isset($data['rate']) && !empty($data['rate'])) {
            $oResults = $oResults->where('rate', '=', $data['rate']);
        }
        if (isset($data['point']) && !empty($data['point'])) {
            $oResults = $oResults->where('point', '=', $data['point']);
        }
        if (isset($data['status']) && !empty($data['status'])) {
            $oResults = $oResults->where('status', '=', $data['status']);
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
        } else {
            $oResults = $oResults->orderBy('created_at', 'desc');
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

        $oResults = new Order();

        $oResults = $oResults->get();

        $aResults = [];

        foreach ($oResults as $result) {
            $aResults[$result->id] = $result->name;
        }
        return $aResults;
    }

    public function create($data)
    {

        $result = Order::create($data);

        if ($result) {
            Session::flash('flash_message', 'order added!');
            return true;
        } else {
            return false;
        }
    }

    public function show($id)
    {

        $order = Order::findOrFail($id);

        return $order;
    }

    public function destroy($id)
    {

        $result = Order::destroy($id);

        if ($result) {
            Session::flash('flash_message', 'order deleted!');
            return true;
        } else {
            return false;
        }
    }

    public function update($id, $data)
    {
        $order = Order::findOrFail($id);
        $result = $order->update((is_array($data)) ? $data : $data->all());
        if ($result) {
            Session::flash('flash_message', 'order updated!');
            return true;
        } else {
            return false;
        }

    }

}
