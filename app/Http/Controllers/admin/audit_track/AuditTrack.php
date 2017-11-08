<?php

namespace App\Http\Controllers\admin\audit_track;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use App\Http\Requests\admin\audit_track\createRequest;
use App\Http\Requests\admin\audit_track\editRequest;
use Session;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;


use App\Models\AuditTrack as mAuditTrack;
use App\Repositories\admin\audit_track\AuditTrackContract as rAuditTrack;

 use App\Repositories\admin\users\UsersContract as rUsers;

class AuditTrack extends Controller
{
    private $rAuditTrack;

    public function __construct(rAuditTrack $rAuditTrack)
    {
        $this->rAuditTrack=$rAuditTrack;
    }
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index(Request $request)
    {


        $oResults=$this->rAuditTrack->getByFilter($request);

        return view('admin.audit_track.index', compact('oResults','request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return view
     */
    public function create(Request $request,rUsers $rUsers)
    {

$usersList=$rUsers->getAllList();

        return view('admin.audit_track.create',compact('request','usersList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return redirect
     */
    public function store(createRequest $request)
    {


        $oResults=$this->rAuditTrack->create($request->all());

        return redirect('admin/audit_track');
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


        $audit_track=$this->rAuditTrack->show($id);
      $request->merge(['audit_track_id'=>$id,'page_name'=>'page']);

    $audit_track_dis=json_decode($audit_track['description']);

        return view('admin.audit_track.show', compact('audit_track','request','audit_track_dis'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return view
     */
    public function edit($id,rUsers $rUsers)
    {


        $audit_track=$this->rAuditTrack->show($id);


 $usersList=$rUsers->getAllList();
        return view('admin.audit_track.edit', compact('audit_track','usersList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     *
     * @return redirect
     */
    public function update($id, editRequest $request)
    {

        $result=$this->rAuditTrack->update($id,$request);

        return redirect('admin/audit_track');
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
        $audit_track=$this->rAuditTrack->destroy($id);
        return redirect('admin/audit_track');
    }


}
