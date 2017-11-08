<?php

namespace App\Http\Controllers\common\users;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use App\Http\Requests\common\users\createRequest;
use App\Http\Requests\common\users\editRequest;
use Session;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;


use App\Models\Users as mUsers;
use App\Repositories\common\users\UsersContract as rUsers;
use App\Repositories\common\authorization\roles\RolesContract as rRoles;

use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

use Cartalyst\Sentinel\Laravel\Facades\Reminder;

class Users extends Controller
{
    private $rUsers;
    private $rRoles;

    public function __construct(rUsers $rUsers,rRoles $rRoles)
    {
        $this->rUsers=$rUsers;
        $this->rRoles=$rRoles;
    }
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index(Request $request)
    {

        $this->rUsers->exportUser($request);

        $oResults=$this->rUsers->getByFilter($request);
        $roleList=$this->rRoles->getAllList()->toArray();

        return view('common.users.index', compact('oResults','request','roleList'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return view
     */
    public function create(Request $request,rRoles $rRoles)
    {

        $rolesList=$rRoles->getAllList();

        return view('common.users.create',compact('request','rolesList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return redirect
     */
    public function store(createRequest $request,rRoles $rRoles)
    {



          $Credentials = [
             'first_name' =>(isset($request->first_name))? $request->first_name:(isset($request->name)? $request->name:''),
             'last_name' => (isset($request->last_name))? $request->last_name:'',
             'email' => $request->email,
             'password' => $request->password,
             'username'=>$request->username,
             'driving _license_no'=>$request->driving_license_no,

        ];


        $user = Sentinel::registerAndActivate($Credentials);
         $mUsers=mUsers::find($user->id);
        $mUsers->update(['username'=>$request->username,'driving_license_no'=>$request->driving_license_no,'civil_id'=>$request->civil_id,'mobile'=>$request->mobile,'phone'=>$request->phone ,'gender'=>$request->gender,'occupation'=>$request->occupation,'type'=>$request->type]);

            Session::flash('flash_message', 'users added!');


       // $oResults=$this->rUsers->create($request);
       
        if(isset($request->roles) && count($request->roles)){
            $rRoles->asignUserRoles($user->id,$request->roles);
        }




        return redirect('common/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return view
     */
    public function show($id,Request $request)
    {


        $users=$this->rUsers->show($id);
      $request->merge(['users_id'=>$id,'page_name'=>'page']);



        return view('common.users.show', compact('users','request'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return view
     */
    public function edit($id,rRoles $rRoles)
    {


        $users=$this->rUsers->show($id);
        unset($users->password);

        $rolesList=$rRoles->getAllList();
        $userRolesList=$rRoles->getUserRoles($id)->toArray();
        return view('common.users.edit', compact('users','rolesList','userRolesList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     *
     * @return redirect
     */
    public function update($id, editRequest $request,rRoles $rRoles)
    {
        $result=$this->rUsers->update($id,$request);
        if(isset($request->roles) && count($request->roles)){
            $rRoles->asignUserRoles($id,$request->roles);
        }
        return redirect('common/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return redirect
     */
    public function destroy($id)
    {
        $users=$this->rUsers->destroy($id);
        return redirect('common/users');
    }

    public function updatePlace(Request $request)
    {
        $result = mUsers::find(current_user()->getUser()->id)->update($request->all());


        return Redirect::back();
    }



    public function p($id){


        $users=$this->rUsers->show($id);
    
        return view('common.users.print',['users'=>$users]);
    }



}
