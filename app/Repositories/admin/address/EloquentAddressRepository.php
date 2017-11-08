<?php
namespace App\Repositories\admin\address;

use Session;
use App\Models\Address;
use App\Repositories\admin\address\AddressContract;

class EloquentAddressRepository implements AddressContract
{

    public function getByFilter($data)
    {

        $oResults = new Address();


        if(canAccess('admin.address.allData')) {

        }elseif(canAccess('admin.address.groupData')){
            $oResults = $oResults->where('users_id','=',  current_user()->getUser()->id);
        }elseif(canAccess('admin.address.userData')){

        }else{return;}

        if (isset($data['id']) && !empty($data['id'])) {
            $oResults = $oResults->where('id', '=' , $data['id']);
        }
        if (isset($data['users_id']) && !empty($data['users_id'])) {
            $oResults = $oResults->where('users_id', '=' , $data['users_id']);
        }
        if (isset($data['area_id']) && !empty($data['area_id'])) {
            $oResults = $oResults->where('area_id', '=' , $data['area_id']);
        }
        if (isset($data['name']) && !empty($data['name'])) {
            $oResults = $oResults->where('name', '=' , $data['name']);
        }
        if (isset($data['type']) && !empty($data['type'])) {
            $oResults = $oResults->where('type', '=' , $data['type']);
        }
        if (isset($data['first_name']) && !empty($data['first_name'])) {
            $oResults = $oResults->where('first_name', '=' , $data['first_name']);
        }
        if (isset($data['last_name']) && !empty($data['last_name'])) {
            $oResults = $oResults->where('last_name', '=' , $data['last_name']);
        }
        if (isset($data['pacl_number']) && !empty($data['pacl_number'])) {
            $oResults = $oResults->where('pacl_number', '=' , $data['pacl_number']);
        }
        if (isset($data['block']) && !empty($data['block'])) {
            $oResults = $oResults->where('block', '=' , $data['block']);
        }
        if (isset($data['street']) && !empty($data['street'])) {
            $oResults = $oResults->where('street', '=' , $data['street']);
        }
        if (isset($data['judda']) && !empty($data['judda'])) {
            $oResults = $oResults->where('judda', '=' , $data['judda']);
        }
        if (isset($data['avenue']) && !empty($data['avenue'])) {
            $oResults = $oResults->where('avenue', '=' , $data['avenue']);
        }
        if (isset($data['building']) && !empty($data['building'])) {
            $oResults = $oResults->where('building', '=' , $data['building']);
        }
        if (isset($data['floor']) && !empty($data['floor'])) {
            $oResults = $oResults->where('floor', '=' , $data['floor']);
        }
        if (isset($data['apartment_number']) && !empty($data['apartment_number'])) {
            $oResults = $oResults->where('apartment_number', '=' , $data['apartment_number']);
        }
        if (isset($data['mobile']) && !empty($data['mobile'])) {
            $oResults = $oResults->where('mobile', '=' , $data['mobile']);
        }
        if (isset($data['phone']) && !empty($data['phone'])) {
            $oResults = $oResults->where('phone', '=' , $data['phone']);
        }
        if (isset($data['long']) && !empty($data['long'])) {
            $oResults = $oResults->where('long', '=' , $data['long']);
        }
        if (isset($data['lat']) && !empty($data['lat'])) {
            $oResults = $oResults->where('lat', '=' , $data['lat']);
        }
        if (isset($data['directions']) && !empty($data['directions'])) {
            $oResults = $oResults->where('directions', '=' , $data['directions']);
        }
        if (isset($data['default']) && !empty($data['default'])) {
            $oResults = $oResults->where('default', '=' , $data['default']);
        }
        if (isset($data['notification']) && !empty($data['notification'])) {
            $oResults = $oResults->where('notification', '=' , $data['notification']);
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

          $oResults = new Address();


        if(canAccess('admin.address.allData')) {

        }elseif(canAccess('admin.address.groupData')){
            $oResults = $oResults->where('users_id','=',  current_user()->getUser()->id);
        }elseif(canAccess('admin.address.userData')){

        }else{return[];}

          $oResults = $oResults->get();

$aResults=[];

foreach($oResults as $result){
$aResults[$result->id]=$result->name;
}
          return $aResults;
    }

    public function create($data)
    {
     $track=  new \App\Models\AuditTrack();$track->track(['action'=>'addAddress','description'=>json_encode($data)]);

        $result = Address::create($data);

        if ($result) {
            Session::flash('flash_message', 'address added!');
            return true;
        } else {
            return false;
        }
    }

    public function show($id)
    {

$address = Address::findOrFail($id);

        return $address;
    }

    public function destroy($id)
    {
        $track=  new \App\Models\AuditTrack();$track->track(['action'=>'Delete Address','description'=>json_encode($this->show($id))]);

        $result =  Address::destroy($id);

        if ($result) {
            Session::flash('flash_message', 'address deleted!');
            return true;
        } else {
            return false;
        }
    }

    public function update($id,$data)
    {
$address = Address::findOrFail($id);
        $track=  new \App\Models\AuditTrack();$track->track(['action'=>'Update Address','description'=>json_encode($data->all())]);


        $result= $address->update($data->all());
        if ($result) {
            Session::flash('flash_message', 'address updated!');
            return true;
        } else {
            return false;
        }

    }

}
