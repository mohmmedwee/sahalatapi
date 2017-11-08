<?php

namespace App\Http\Controllers\website\users;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use Session;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;


use App\Models\Order as mOrder;
use App\Models\Cart as mCart;
use App\Models\Payment as mPayment;
use App\Models\Dish as mDish;

use App\Repositories\website\order\OrderContract as rOrder;
use App\Repositories\website\area\AreaContract as rArea;
use App\Repositories\website\dish\DishContract as rDish;
use App\Repositories\website\cart\CartContract as rCart;
use App\Repositories\website\address\AddressContract as rAddress;
use App\Repositories\website\restaurant\RestaurantContract as rRestaurant;
use App\Repositories\website\operation_hour\OperationHourContract as rOperationHour;
use App\Repositories\website\payment\PaymentContract as rPayment;

use Illuminate\Support\Facades\DB;

use App\Models\PaymentWay as mPaymentWay;


use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

class Order extends Controller
{

    private $rOrder;
    private $rDish;
    private $rCart;

    public function __construct(rOrder $rOrder, rDish $rDish, rCart $rCart)
    {
        $this->rOrder = $rOrder;
        $this->rDish = $rDish;
        $this->rCart = $rCart;
    }

    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index(
        Request $request,
        rOrder $rOrder,
        rAddress $rAddress,
        rArea $rArea,
        rRestaurant $rRestaurant,
        rOperationHour $rOperationHour,
        rPayment $rPayment
    ) {
        $current_date = gmdate('Y-m-d');
        $validationErrors = [];

        $selected_day = (isset($request->selected_day)) ? $request->selected_day : null;
        $selected_time = (isset($request->selected_time)) ? $request->selected_time : null;

        $selected_day = (isset($request->nowTime)) ?  $current_date: $selected_day;
        $selected_time = (isset($request->nowTime)) ? gmdate('H:i'): $selected_time;


        if (!isset($request->order_id)) {
            return Redirect::back();
        }

        $request->merge(['getAllRecords' => 1]);
        if(current_user()->getUser()==true)
        {
        $request->merge(['users_id' =>  current_user()->getUser()->id]);
        }
        $oOrder = $rOrder->show($request->order_id);


        $lastAddressId = 0;
        $oAddressResults = $rAddress->getByFilter($request->all());
        $addressList = [];
        foreach ($oAddressResults as $address) {
            $addressList[$address->id] = $address->name;
            $lastAddressId = $address->id;
        }


        $oAddress = [];
        $addressId = (isset($request->selected_address_id)) ? $request->selected_address_id : $lastAddressId;
        if ($addressId > 0) {
            $oAddress = $rAddress->show($addressId);
            $request->selected_address_id = $addressId;
        }

        $oRestaurant = $rRestaurant->show($oOrder->restaurant_id);

        $selected_area_id = (isset($oAddress->area_id)) ? $oAddress->area_id : $oRestaurant->area_id;


        $discount = 0;;

        $totalDiscount = 0;
        $total = 0;
        $restaurant_discount = $oRestaurant->discount;

        if (count($oOrder) && count($oOrder->cart)) {

            foreach ($oOrder->cart as $cart) {

                $discount = (isset($cart->dish->discount) && $cart->dish->discount != null) ? $cart->dish->discount : $restaurant_discount;
                if ($oRestaurant->discount_type == config('array.restaurant_discount_type_percentage_index')) {
                    $totalDiscount += ($cart->unit_price * $cart->quantity * $discount / 100);
                } else {

                    $totalDiscount += ($cart->quantity * $discount);
                }
                $total += $cart->unit_price * $cart->quantity;

                if ($cart->quantity > $cart->dish->quantity) {
                    $validationErrors['quantity'] = trans('website.errorMessageQuantity1').' (' . $cart->dish->{'name_' . config('app.locale')} . ') '.trans('website.errorMessageQuantity2').' ' . $cart->dish->quantity;
                }


                if ($cart->dish->available_from > $current_date || $cart->dish->available_to < $current_date) {
                    $validationErrors['dish-available'] ='(' . $cart->dish->{'name_' . config('app.locale')} . ')' .  trans('website.errorMessageAvailableTime1') . $cart->dish->available_from . ' '.trans('website.errorMessageAvailableTime2').' ' . $cart->dish->available_to;
                }


            }
        }
        $totalDiscount = round($totalDiscount, 2);
        $totalDiscount=($totalDiscount >$total)? $total:$totalDiscount;

        $data = $this->validateCheckout($oRestaurant, $selected_area_id, $total, $selected_day, $selected_time);

        if ($lastAddressId == 0) {

            $validationErrors['deliver_area'] =trans('website.errorMessageAddressAdd');
        }
        $areaList = $rArea->getAllList();


        $validationErrors = array_merge($validationErrors, $data['orderErrors']);

        if (isset($request->proceedToPayment) && count($validationErrors) == 0) {
            $extra_charge = 0;

            $totalWithExtraDiscount = (floatval($data['restaurant_deliver_charge'])  + floatval($extra_charge) + floatval($total)) - floatval($totalDiscount);//+ $data['sahalat_deliver_charge']
            $totalWithExtraDiscount=($totalWithExtraDiscount > 0)?$totalWithExtraDiscount:0;

            $oPaymentWayCommission=mPaymentWay::where(['restaurant_id'=>$oRestaurant->id,'payment_type'=> $request->payment_type])->first();
            $commission=0;
            if(count($oPaymentWayCommission)){
                $commission=($oPaymentWayCommission->type ==config('array.payment_way_commission_type_percentage_index'))? $totalWithExtraDiscount*floatval($oPaymentWayCommission->commission)/100:$oPaymentWayCommission->commission;
            }


            $orderData = [
                "area_id" => $selected_area_id,
                "address_id" => $addressId,
                "deliver_time" => $request->selected_time,
                "deliver_date" => (($request->selected_day == 'today') ? date('Y-m-d') : $data['available_days_date'][$request->selected_day]),
                "note" => $request->note,
                "deliver_charge" => $data['restaurant_deliver_charge'],
                "sahalat_charge" => $data['sahalat_deliver_charge'],
                "extra_charge" => $extra_charge,
                "sub_total" => $total,
                "commission"=>$commission,
                "total" =>  $totalWithExtraDiscount,
//                "status" => config('array.order_status_payed_index'),
                "notification" => 0
            ];


            $rOrder->update($request->order_id, $orderData);

            /*_____________________________________-payment__insert init__*/
            $paymentExist = mPayment::where(['order_id' => $request->order_id])->first();
            $m_payment_id=0;
            if (count($paymentExist)) {

                $m_payment_id=$rPayment->update($paymentExist->id, [
                    "amount" => $totalWithExtraDiscount,
                    "status" => 0,
                    "type" => $request->payment_type,
                    "notification" => 0
                ]);
            } else {
                $m_payment_id=  $rPayment->create([
                    "order_id" => $request->order_id,
                    "users_id" => current_user()->getUser()->id,
                    "amount" => $totalWithExtraDiscount,
                    "status" => 0,
                    "type" => $request->payment_type,
                    "notification" => 0
                ]);
            }


            /*________________________knet*/

            if($request->payment_type==config('array.payment_type_knet_index')){

                $knet= new \App\Http\Controllers\common\payment\knet\Knet();


                //   $url= $knet->makePayment(($data['subTotal']-$data['totalDiscount']),$inputData['order_id']);
                $payment_id=0;
                list($url,$payment_id)= $knet->makePayment(($totalWithExtraDiscount),$request->order_id);
                // dd($url);

                //  return Redirect::to('http://fintolog.com/knet');
                mPayment::where('id','=',$m_payment_id)->update(['module_id'=>$payment_id]);
                return Redirect::to($url);
            }else if($request->payment_type==config('array.payment_type_cash_index')){
            return redirect('/cashon/'.$request->order_id);
            }

            /*____________________END____knet*/

            /*___________________________________minis the quantity*/

            if (count($oOrder) && count($oOrder->cart)) {
                foreach ($oOrder->cart as $cart) {
                    mDish::find($cart->dish_id)->update(['quantity' => DB::raw('quantity - ' . $cart->quantity)]);

                }
            }


            if ($request->ajax()) {
                return new JsonResponse(['status' => 'success', 'redirect' => '/users#tab_default_3'], 200);

            } else {
                return Redirect::to('/users#tab_default_3');
            }

        }


        return view('website.users.order',
            compact('oOrder', 'areaList', 'oAddress', 'oAddressResults', 'addressList', 'request', 'oRestaurant'))
            ->with($data)->with([
                'discount' => $discount,
                'totalDiscount' => $totalDiscount,
                'validationErrors' => $validationErrors
            ]);
    }

    public function validateCheckout(
        &$oRestaurant,
        $selected_area_id,
        $total,
        $selected_day = null,
        $selected_time = null
    ) {
        $errors = [];
        $restaurant_status = $oRestaurant->status;

        if ($restaurant_status == config('array.restaurant_status_close_index') && $oRestaurant->offline_order == 0) {
            $errors['close'] = trans('website.errorMessageClose') ;
        }

//if($oRestaurant->status ==config('array.restaurant_status_open_index')){}
        $current_day = date('w');
        $current_hour = date('H:i');
        $current_date = date('Y-m-d');
//    $current_date_number=strtotime($current_date);

        $deliver_time_from = $oRestaurant->deliver_time_from;
        $deliver_time_to = $oRestaurant->deliver_time_to;
        $min_amount = $oRestaurant->min_amount;
        $restaurant_deliver_charge = $oRestaurant->deliver_charge;
        $sahalat_deliver_charge = config('project.deliver_charge');

        /* todo determined the commission according to the $commission_type */
        //   $commission_type=$oRestaurant->commission_type;

        $order_accept_days = $oRestaurant->order_accept_days;

        $restaurant_area_id = $oRestaurant->area_id;

        $area = '';

        if (count($oRestaurant->restaurant_area)) {
            foreach ($oRestaurant->restaurant_area as $oneArea) {
                if ($selected_area_id == $oneArea->area_id) {
                    $area = $oneArea;
                }
            }

            if ($area == '') {
                $errors = ['deliver_area' => trans('website.errorMessageDeliverArea') ];
            }
        }

        if ($area == '' && $selected_area_id != $oRestaurant->area_id) {
            $errors = ['deliver_area' => trans('website.errorMessageDeliverArea') ];
        }

        if ($area != '') {
            $min_amount = $area->min_amount;

            $deliver_time_from = $area->deliver_time_from;
            $deliver_time_to = $area->deliver_time_to;

            $restaurant_deliver_charge = $area->delivery_charges;
            $sahalat_deliver_charge = $area->sahalat_charge;
        }

        $all_days = config('array.days');
        $operation_hour_day = [];
        if (isset($area->operation_hour) && count($area->operation_hour)) {
            foreach ($area->operation_hour as $day) {
                $operation_hour_day[$day->day] = $all_days[$day->day];
            }
        }
        if (count($operation_hour_day) == 0) {
            $operation_hour_day = $all_days;
        }

        if ($min_amount > $total) {
            $errors['amount'] = trans('website.errorMessageMinimum') . $min_amount;
        }


        $available_days = [];
        $available_days_date = [];
        $j = 1;
        for ($i = $current_day + 1; $i < $current_day + 1 + $order_accept_days; $i++) {
            $index = $i % 7;
            if (isset($operation_hour_day[$index])) {
                $available_days_date[$index] = date('Y-m-d', strtotime($current_date . ' + ' . $j . ' days'));
                $available_days[$index] = $all_days[$index] . ', ' . $available_days_date[$index];
            }
            $j++;
        }

        $current_restaurant_status = ($oRestaurant->status == config('array.restaurant_status_open_index')) ? 'open' : 'close';

        $current_restaurant_status = ($current_restaurant_status == 'open' &&
            $current_hour >= $deliver_time_from &&
            $current_hour <= $deliver_time_to &&
            isset($operation_hour_day[$current_day])
        ) ? 'open' : 'close';


        if ($current_restaurant_status == 'close' && $oRestaurant->offline_order == 0) {
            $errors['close'] =  trans('website.errorMessageClose') .
                trans('website.errorMessageCloseOpenHours').' (' . $deliver_time_from . ' - ' . $deliver_time_to . ' )';
        }


        $available_deliver_times = [];
        if ($current_restaurant_status == 'open') {

            for ($i = $this->timeToSecond($current_hour) + (config('project.deliver_period') * 60); $i < $this->timeToSecond($deliver_time_to); $i += (config('project.deliver_period') * 60)) {
                $available_deliver_times['today'][] = date('H:i', $i);
            }
        }

        if ($oRestaurant->offline_order == 1) {
            $parts_of_day = [];
            for ($i = $this->timeToSecond($deliver_time_from) + (config('project.deliver_period') * 60); $i < $this->timeToSecond($deliver_time_to); $i += (config('project.deliver_period') * 60)) {
                $parts_of_day[] = date('H:i', $i);
            }
            foreach ($available_days as $day_index => $available_day) {

                $available_deliver_times[$day_index] = $parts_of_day;
            }


        }elseif($oRestaurant->offline_order == 0){

                $parts_of_day = [];
            for ($i = $this->timeToSecond($deliver_time_from) + (config('project.deliver_period') * 60); $i < $this->timeToSecond($deliver_time_to); $i += (config('project.deliver_period') * 60)) {
                $parts_of_day[] = date('H:i', $i);
            }
            foreach ($available_days as $day_index => $available_day) {

                $available_deliver_times[$day_index] = $parts_of_day;
            }

        }
  

        if ($selected_day != null || $selected_time != null) {
            if (array_key_exists($selected_day,
                    $available_deliver_times) && $selected_time >= $deliver_time_from && $selected_time <= $deliver_time_to
            ) {

            } else {
                $errors['deliver_time'] = trans('website.errorMessageNoDeliverTime');
            }
        }


        return [
            'orderErrors' => $errors,
            'operation_hour_day' => $operation_hour_day,
            'order_accept_days' => $order_accept_days,
            'min_amount' => $min_amount,
            'available_days' => $available_days,
            'available_deliver_times' => $available_deliver_times,
            'offline_order' => $oRestaurant->offline_order,
            'deliver_time_from' => $deliver_time_from,
            'deliver_time_to' => $deliver_time_to,
            'restaurant_deliver_charge' => $restaurant_deliver_charge,
            'sahalat_deliver_charge' => $sahalat_deliver_charge,
            'available_days_date' => $available_days_date
        ];


    }

    public function timeToSecond($str_time)
    {


        $str_time = preg_replace("/^([\d]{1,2})\:([\d]{2})$/", "$1:$2:00", $str_time);

        $str_time_array = explode(':', $str_time);

        return $str_time_array[0] * 3600 + $str_time_array[1] * 60 + $str_time_array[2];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return view
     */
    public function create(Request $request)
    {

        if (!isset($request->dish_id)) {
            return new JsonResponse(['Please select dish.'], 422);
        }


        if (!isset(current_user()->getUser()->id)) {
            current_user()->greatGestUser();
        }

        if(current_user()->getUser()->type==config('array.users_type_guest_index')){
            $orderNumber=current_user()->getTotalOrderNumber();

            if( $orderNumber >= config('module.max_guest_order')){
                $this->guestReachMax();
                return Redirect::back()->withErrors([trans('order.guestReachMaxOrderNumber')]);
            }
        }


        $users_id = current_user()->getUser()->id;

        $dish_ids = (is_array($request->dish_id)) ? $request->dish_id : [$request->dish_id];

        foreach ($dish_ids as $dish_id) {
            $oDish = $this->rDish->show($dish_id);
            $restaurant_id = $oDish->restaurant_id;

            $oCurrentOrder = mOrder::where([
                'users_id' => $users_id,
                'restaurant_id' => $restaurant_id,
                'status' => config('array.order_status_pending_index')
            ])->first();

            $order_id = 0;
            if (!isset($oCurrentOrder->id)) {
                $oOrder = mOrder::create([
                    'users_id' => $users_id,
                    'restaurant_id' => $restaurant_id,
                    'status' => config('array.order_status_pending_index')
                ]);
                $oOrder->save();
                $order_id = $oOrder->id;
            } else {
                $order_id = $oCurrentOrder->id;
            }
            $this->addDishToOrder($request, $order_id, $dish_id);


        }


        if ($request->ajax()) {
            return new JsonResponse(['status' => 'success'], 200);

        } else {
            if (isset($request->redirectToOrder)) {
                return Redirect::to('/order?order_id=' . $request->redirectToOrder);
            }
            return Redirect::back();
        }
    }

    public function greatGestUser()
    {

        $credentials = [

            'email' => 'guest_' . rand(99999, 99999999) . '_' . rand(99999, 99999999) . '@sahalat.com',
            'password' => rand(99999, 99999999) . '_' . rand(99999, 99999999),
            'type' => config('array.users_type_guest_index'),
        ];

        $user = Sentinel::registerAndActivate($credentials);

        $role = Sentinel::findRoleByName('client');
        $role->users()->attach($user);


        $role2 = Sentinel::findRoleByName('guest');
        $role2->users()->attach($user);

        Sentinel::login($user);
    }

    public function addDishToOrder($request, $order_id, $dish_id)
    {
        $users_id = current_user()->getUser()->id;
        $quantity = 1;
        if (isset($request->quantity) && isset($request->quantity[$dish_id])) {
            $quantity = $request->quantity[$dish_id];
        } elseif (isset($request->quantity) && $request->quantity > 0) {
            $quantity = $request->quantity;
        }


        $oOrder = $this->rOrder->show($order_id);
        $oDish = $this->rDish->show($dish_id);

        $oCart = mCart::where(['users_id' => $users_id, 'order_id' => $order_id, 'dish_id' => $dish_id])->first();

        if (count($oCart)) {
            $oCart->quantity += $quantity;

            $oCart->save();
        } else {

            $oCart = mCart::create([
                'users_id' => $users_id,
                "restaurant_id" => $oOrder->restaurant_id,
                'order_id' => $order_id,
                'dish_id' => $dish_id,
                'unit_price' => $oDish->price,
                'quantity' => $quantity,
                'special_request' => ((isset($request->special_request)) ? $request->special_request : '')

            ]);
            $oCart->save();

        }


    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {


    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return void
     */
    public function show($id)
    {


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return void
     */
    public function edit($id)
    {


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     *
     * @return void
     */
    public function update($id, Request $request)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return void
     */
    public function destroy($id)
    {

    }

    public function guestReachMax(){

        $users=current_user()->getUser();

        $users->email=config('module.max_reach_notification_email');
        $users->phone=config('module.max_reach_notification_phone');

        notification('guest_max',['users'=>$users,]);
    }



public function invoice($id,Request $request,rCart $rCart){
    
         $order=$this->rOrder->show($id);
        $request->merge(['order_id'=>$id,'page_name'=>'page']);

        $request->page_name='page_cart';
        $oCartResults=$rCart->getByFilter($request);




    return view('website.users.invoice' ,['oCartResults'=>$oCartResults, 'order'=>$order]);
}

public function getpacitoken()
    {
        $data = array('username' => 'SahalatUser', 'password' => '$ah@lat697', 'referer' => 'http://sahalat.fintolog.com/', 'expiration' => '20160', 'f' => 'pjson' , 'php_master' => true);
$curl = curl_init();
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://kuwaitportal.paci.gov.kw/arcgis/sharing/generateToken", 
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 1000000,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_POST => true,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => $data 
));
$response = curl_exec($curl);				

$err = curl_error($curl);
curl_close($curl);

	//echo $response;
	$obj = json_decode($response , true);
	$token = $obj['token'];
	

        return $token;


    }
}
