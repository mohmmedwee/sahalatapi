<?php

namespace App\Http\Controllers\website\dish_rate;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use Session;
use Illuminate\Http\JsonResponse;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;


use App\Models\DishRate as mDishRate;
use App\Models\Dish as mDish;
use App\Repositories\website\dish_rate\DishRateContract as rDishRate;

use App\Repositories\website\users\UsersContract as rUsers;
use App\Repositories\website\dish\DishContract as rDish;

class DishRate extends Controller
{
    private $rDishRate;

    public function __construct(rDishRate $rDishRate, rDish $rDish)
    {
        $this->rDishRate = $rDishRate;
        $this->rDish = $rDish;
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
    public function create(Request $request, rUsers $rUsers, rDish $rDish)
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @return redirect
     */
    public function store(Request $request)
    {

        $existResult = $this->rDishRate->getByFilter([
            'dish_id' => $request->id,
            'users_id' => current_user()->getUser()->id
        ])->first();

        $rateData = [
            'dish_id' => $request->id,
            'users_id' => current_user()->getUser()->id,
            'notification'=>0,
            'status' => config('array.dish_rate_status_pending_index')

        ];
        if (isset($request->rate) && !empty($request->rate)) {
            $rateData['rate'] = $request->rate;
        }
        if (isset($request->description) && !empty($request->description)) {
            $rateData['description'] = $request->description;
        }

        if (count($existResult)) {
            $rateData['status'] = (isset($rateData['description']) && $existResult->description != $rateData['description']) ? 0 : $existResult->status;
            $result = $this->rDishRate->update($existResult->id, $rateData);
        } else {
            $result = $this->rDishRate->create([
                'dish_id' => $request->id,
                'users_id' => current_user()->getUser()->id,
                'rate' => $request->rate,
                'notification' => 0,
                'status' => 0,
                'description' => $request->description
            ]);
        }
        $totalRate = $this->updateDishRate($request->id);
        $dishRate = $this->rDishRate->getByFilter([
            'dish_id' => $request->id,
            'status' => config('array.dish_rate_status_accepted_index')
        ]);
        return new JsonResponse([
            'totalRate' => $totalRate,
            'status' => 'success',
            'message' => view('website.dish_rate.list', compact('dishRate'))->with($rateData)->render()
        ], 200);
    }

    function updateDishRate($dish_id)
    {
        $rate = mDishRate::select([
            DB::raw('count(id) as number'),
            DB::raw('sum(rate) as total')
        ])->where(['dish_id' => $dish_id])->groupBy('dish_id')->first();
        $dishRate = 0;


       if ($rate) {
            $dishRate = $rate->total / $rate->number;

            mDish::where('id','=',$dish_id)->update( ["rating" => $dishRate]);
      }
        return $dishRate;
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


        $dish_rate = $this->rDishRate->show($id);
        $request->merge(['dish_rate_id' => $id, 'page_name' => 'page']);


        return view('website.dish_rate.show', compact('dish_rate', 'request'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return view
     */
    public function edit($id, rUsers $rUsers, rDish $rDish)
    {


        $dish_rate = $this->rDishRate->show($id);


        $usersList = $rUsers->getAllList();
        $dishList = $rDish->getAllList();
        return view('website.dish_rate.edit', compact('dish_rate', 'usersList', 'dishList'));
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

        $result = $this->rDishRate->update($id, $request);

        return redirect('website/dish_rate');
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
        $dish_rate = $this->rDishRate->destroy($id);
        return redirect('website/dish_rate');
    }


}
