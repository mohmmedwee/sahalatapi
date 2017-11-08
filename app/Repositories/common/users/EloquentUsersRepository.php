<?php
namespace App\Repositories\common\users;

use Session;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use App\Models\Users;
use App\Repositories\common\users\UsersContract;

class EloquentUsersRepository implements UsersContract
{

    public function getByFilter($data)
    {

        $oResults = new Users();

        if (isset($data->id) && !empty($data->id)) {
            $oResults = $oResults->where('users.id', 'like', '%' . $data['id'] . '%');
        }
        if (isset($data->email) && !empty($data->email)) {
            $oResults = $oResults->where('users.email', 'like', '%' . $data['email'] . '%');
        }
        if (isset($data->mobile) && !empty($data->mobile)) {
            $oResults = $oResults->where('users.mobile', 'like', '%' . $data['mobile'] . '%');
        }
        if (isset($data->password) && !empty($data->password)) {
            $oResults = $oResults->where('users.password', 'like', '%' . $data['password'] . '%');
        }
        if (isset($data->permissions) && !empty($data->permissions)) {
            $oResults = $oResults->where('users.permissions', 'like', '%' . $data['permissions'] . '%');
        }
        if (isset($data->first_name) && !empty($data->first_name)) {
            $oResults = $oResults->where('users.first_name', 'like', '%' . $data['first_name'] . '%');
        }
        if (isset($data->last_name) && !empty($data->last_name)) {
            $oResults = $oResults->where('users.last_name', 'like', '%' . $data['last_name'] . '%');
        }
        if (isset($data->avatar) && !empty($data->avatar)) {
            $oResults = $oResults->where('users.avatar', 'like', '%' . $data['avatar'] . '%');
        }
        if (isset($data->blogger) && !empty($data->blogger)) {
            $oResults = $oResults->where('users.blogger','=',$data['blogger'] );
        }
        if (isset($data->role_id) && !empty($data->role_id)) {

            $oResults = $oResults
                ->leftJoin('role_users','users.id','=','role_users.user_id')
                ->where('role_users.role_id','=',$data['role_id'] )
                ->select(['users.*']);
        }


        if (isset($data['bestUser']) && !empty($data['bestUser'])) {
            $oResults=$oResults->leftJoin('order','users.id','=','order.users_id');
            $oResults=$oResults->where('order.status','!=',config('array.order_status_pending_index'));
            $oResults = $oResults->select(['users.*',\DB::raw('count(order.id) as order_number')])->groupBy('order.users_id')->orderBy('order_number','desc');
        }


        if (isset($data->users_type) && !empty($data->users_type)) {

            $oResults = $oResults->where('users.type','=',$data['users_type'] );
        }

        if (isset($data->order) && !empty($data->order)) {
            $sort = (isset($data->sort) && !empty($data->sort)) ? $data->sort : 'desc';
            $oResults = $oResults->orderBy($data->order, $sort);
        }

        $oResults = $oResults->paginate(15);
        return $oResults;
    }
    public function getAllList(){

        $oResults = new Users();

        $oResults = $oResults->get();
        $aResults=[];
        foreach($oResults as $oResult){
            $aResults[$oResult->id]=$oResult->first_name .' '.$oResult->last_name;
        }
        return $aResults;
    }
    public function create($data)
    {


         // $aCredentials = [
         //    'first_name' =>(isset($data->first_name))? $data->first_name:(isset($data->name)? $data->name:''),
         //     'last_name' => (isset($data->last_name))? $data->last_name:'',
         //    'email' => $data->email,
         //     'password' => $data->password,
      
         //     'username'=>$data->username

         // ];


         //    $oUser = Sentinel::registerAndActivate($aCredentials);




        // if ($oUser) {
        //     Session::flash('flash_message', 'users added!');
        //     return $oUser->id;
        // } else {
        //     return false;
        // }


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
        $data=is_array($data)? $data:$data->all();
       $password=$data['password'];
        unset($data['password']);


$users = Users::findOrFail($id);
      $users->update($data);
        $result=$this->changePassword($id,$password);
        if ($users) {
            Session::flash('flash_message', 'users updated!');
            return true;
        } else {
            return false;
        }

    }

    function changePassword($id,$password)
    {


        $user = Sentinel::findById($id);

        /* TODO validate password and confirm from Request not from code */

            if ($password!='' && Sentinel::update($user, array('password' => $password)))
            {
                Session::flash('flash_message', 'Password Updated!');
                return true;
            }else{
            return false;
        }


    }










   public function exportUser($request){

        if(!isset($request->exportExcel)){return false;}

          

        $request->merge(['getAllRecords'=>1]);

       
        // 

        if($request->role_id){
        $oResults=$this->getByFilter($request);
        }else{

        $oResults = new Users();    
        $oResults = $oResults->get();

    }


        $excelData=$this->UsersToArray($oResults);

         ob_end_clean();
         ob_start();
        \Excel::create('users', function($excel) use($excelData) {

            $excel->sheet('Excel sheet', function($sheet) use($excelData) {

                $sheet->fromArray($excelData);
                $sheet->setOrientation('landscape');
                $sheet->setAllBorders('thin');

$sheet->setSize(array(
    'D1' => array(
        'width'     => 40,
        'height'    => 20
    ),

        'B1' => array(
        'width'     => 10,
        'height'    => 20
    ),


    'C1' => array(
        'width'     => 40,
        'height'    => 20
    ),
 'A1' => array(
        'width'     =>5,
        'height'    => 20
    ),


));

            });

        })->export(($request->exportExcel =='pdf')?'pdf':'xls');
    }



 public function UsersToArray($oResults){

    
        $aResults=[['id','First name','Last name','email']];
        if(count($oResults)){

            foreach($oResults as $oResult){
                $aResults[]=[
                    $oResult->id ,
                    (isset($oResult->first_name))?$oResult->first_name:'' ,
                     (isset($oResult->last_name))?$oResult->last_name:'' ,
                    (isset($oResult->email))?$oResult->email:'' , 


                ];

            }
        }

        return $aResults;
    }





























}






















