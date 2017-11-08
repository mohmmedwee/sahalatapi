<?php

namespace App\Http\Controllers\common\json;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use Session;

use Illuminate\Support\Facades\View;



class Json extends Controller
{

    public function __construct()
    {

    }

    public function getJsonFromUrl(Request $request){


        $url ="https://maps.googleapis.com/maps/api/directions/json?origin=32.05316727895472,36.08853166469726&destination=32.05316727895472,36.08853166469726&waypoints=32.028721253063296%20,%2036.08793084987792|32.05127585522657,36.132777384606925|32.06655162175497,36.10213582882079&key=AIzaSyDLkoPoZU4wmIOavt0y7yEj8n2k2mBalRI" ;//$request->url;
        $cURL = curl_init();
//        curl_setopt($cURL, CURLOPT_URL, $url);
//        curl_setopt($cURL, CURLOPT_HTTPGET, true);
//        curl_setopt($cURL, CURLOPT_HTTPHEADER, array(
//            'Content-Type: application/json',
//            'Accept: application/json'
//        ));

        $result = curl_exec($cURL);


        dd($result);
        dd(json_encode($result, true));
        curl_close($cURL);
    }
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index(Request $request)
    {


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return view
     */
    public function create(Request $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @return redirect
     */
    public function store(createRequest $request)
    {


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


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return view
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     *
     * @return redirect
     */
    public function update($id, Request $request)
    {

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

    }


}
