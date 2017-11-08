<?php

namespace App\Http\Controllers\admin\contact_us;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use App\Http\Requests\admin\contact_us\createRequest;
use App\Http\Requests\admin\contact_us\editRequest;
use Session;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;


use App\Models\ContactUs as mContactUs;
use App\Repositories\admin\contact_us\ContactUsContract as rContactUs;

 use App\Repositories\admin\users\UsersContract as rUsers;

class ContactUs extends Controller
{
    private $rContactUs;

    public function __construct(rContactUs $rContactUs)
    {
        $this->rContactUs=$rContactUs;
    }
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index(Request $request)
    {


        $oResults=$this->rContactUs->getByFilter($request);

        return view('admin.contact_us.index', compact('oResults','request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return view
     */
    public function create(Request $request,rUsers $rUsers)
    {

$usersList=$rUsers->getAllList();

        return view('admin.contact_us.create',compact('request','usersList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return redirect
     */
    public function store(createRequest $request)
    {


        $oResults=$this->rContactUs->create($request->all());

        return redirect('admin/contact_us');
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


        $contact_us=$this->rContactUs->show($id);
      $request->merge(['contact_us_id'=>$id,'page_name'=>'page']);



        return view('admin.contact_us.show', compact('contact_us','request'));
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


        $contact_us=$this->rContactUs->show($id);


 $usersList=$rUsers->getAllList();
        return view('admin.contact_us.edit', compact('contact_us','usersList'));
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

        $result=$this->rContactUs->update($id,$request);

        return redirect('admin/contact_us');
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
        $contact_us=$this->rContactUs->destroy($id);
        return redirect('admin/contact_us');
    }


}
