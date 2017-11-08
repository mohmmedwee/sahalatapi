<?php

namespace App\Http\Controllers\website\restaurant_rate;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use Session;
use Illuminate\Http\JsonResponse;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;


use App\Models\RestaurantRate as mRestaurantRate;
use App\Models\Restaurant as mRestaurant;
use App\Repositories\website\restaurant_rate\RestaurantRateContract as rRestaurantRate;

use App\Repositories\website\users\UsersContract as rUsers;
use App\Repositories\website\restaurant\RestaurantContract as rRestaurant;

class RestaurantRate extends Controller
{
    private $rRestaurantRate;

    public function __construct(rRestaurantRate $rRestaurantRate, rRestaurant $rRestaurant)
    {
        $this->rRestaurantRate = $rRestaurantRate;
        $this->rRestaurant = $rRestaurant;
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
    public function create(Request $request, rUsers $rUsers, rRestaurant $rRestaurant)
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @return redirect
     */
    public function store(Request $request)
    {

        $existResult = $this->rRestaurantRate->getByFilter([
            'restaurant_id' => $request->id,
            'users_id' => current_user()->getUser()->id
        ])->first();

        $rateData = [
            'restaurant_id' => $request->id,
            'users_id' => current_user()->getUser()->id,
            'status' => config('array.restaurant_rate_status_pending_index')

        ];
        if (isset($request->rate) && !empty($request->rate)) {
            $rateData['rate'] = $request->rate;
        }
        if (isset($request->description) && !empty($request->description)) {
            $rateData['description'] = $request->description;
        }

        if (count($existResult)) {
            $rateData['status'] = (isset($rateData['description']) && $existResult->description != $rateData['description']) ? 0 : $existResult->status;
            $result = $this->rRestaurantRate->update($existResult->id, $rateData);
        } else {
            $result = $this->rRestaurantRate->create([
                'restaurant_id' => $request->id,
                'users_id' => current_user()->getUser()->id,
                'rate' => $request->rate,
                'notification' => 0,
                'status' => 0,
                'description' => $request->description
            ]);
        }
        $totalRate = $this->updateRestaurantRate($request->id);
        $restaurantRate = $this->rRestaurantRate->getByFilter([
            'restaurant_id' => $request->id,
            'status' => config('array.restaurant_rate_status_accepted_index')
        ]);
        return new JsonResponse([
            'totalRate' => $totalRate,
            'status' => 'success',
            'message' => view('website.restaurant_rate.list', compact('restaurantRate'))->with($rateData)->render()
        ], 200);
    }

    function updateRestaurantRate($restaurant_id)
    {
        $rate = mRestaurantRate::select([
            DB::raw('count(id) as number'),
            DB::raw('sum(rate) as total')
        ])->where(['restaurant_id' => $restaurant_id])->groupBy('restaurant_id')->first();
        $restaurantRate = 0;


       if ($rate) {
            $restaurantRate = $rate->total / $rate->number;

            mRestaurant::where('id','=',$restaurant_id)->update( ["rating" => $restaurantRate]);
      }
        return $restaurantRate;
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return view
     */
    public function show($id, Request $request)
    {


        $restaurant_rate = $this->rRestaurantRate->show($id);
        $request->merge(['restaurant_rate_id' => $id, 'page_name' => 'page']);


        return view('website.restaurant_rate.show', compact('restaurant_rate', 'request'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return view
     */
    public function edit($id, rUsers $rUsers, rRestaurant $rRestaurant)
    {


        $restaurant_rate = $this->rRestaurantRate->show($id);


        $usersList = $rUsers->getAllList();
        $restaurantList = $rRestaurant->getAllList();
        return view('website.restaurant_rate.edit', compact('restaurant_rate', 'usersList', 'restaurantList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     *
     * @return redirect
     */
    public function update($id, editRequest $request)
    {

        $result = $this->rRestaurantRate->update($id, $request);

        return redirect('website/restaurant_rate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return redirect
     */
    public function destroy($id)
    {
        $restaurant_rate = $this->rRestaurantRate->destroy($id);
        return redirect('website/restaurant_rate');
    }


}
