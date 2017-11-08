<?php namespace App\Http\Controllers\admin\paymentcash;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Session;



use App\Models\Order as mOrder;
use App\Repositories\admin\order\OrderContract as rOrder;

 use App\Repositories\admin\users\UsersContract as rUsers;
 use App\Repositories\admin\area\AreaContract as rArea;
use App\Repositories\admin\address\AddressContract as rAddress;
use App\Repositories\admin\restaurant\RestaurantContract as rRestaurant;
use App\Repositories\admin\dish\DishContract as rDish;
use App\Repositories\admin\menu_section\MenuSectionContract as rMenuSection;

use App\Repositories\admin\restaurant_users\RestaurantUsersContract as rRestaurantUsers;
use App\Repositories\admin\cart\CartContract as rCart;
use App\Repositories\admin\restaurant_offer\RestaurantOfferContract as rRestaurantOffer;

use App\Repositories\admin\deliver_package\EloquentDeliverPackageRepository as rDeliverPackage;



/**
* 
*/
class Cashondelivery extends Controller
{

private $rOrder;


	public function __construct(rOrder $rOrder)
    {
        $this->rOrder=$rOrder;
    }


public function success($id,rOrder $rOrder){

		$order=$this->rOrder->show($id);
        $oCartResults=$order->cart;

    $rOrder->update($id,[ "status" => config('array.order_status_payed_index'),'create_success_order_id'=>1] );

return view('website.cashondelevary.success' ,['oCartResults'=>$oCartResults, 'order'=>$order]);

}





public function cashemail( Request $request, rCart $rCart){

$id=$request->id;
$emailto=$request->emailto;

$order=$this->rOrder->show($request->id);
        $request->merge(['order_id'=>$id,'page_name'=>'page']);

        $request->page_name='page_cart';
        $oCartResults=$rCart->getByFilter($request);


//    notification('order_paid_success',['users'=>current_user()->getUser(),'order'=>$rOrder->show($oPayment->order_id)]);

 \Mail::send('website.users.invoice',['request'=>$request,'oCartResults'=>$oCartResults,'order'=>$order], function($message) use ($emailto)
        {
            
            $message->from('info@Deera.com', 'Invoice');
           
            $message->to($emailto);

          
 
        });




	Session::flash('flash_success','email sent successfuly ! ');
return redirect()->back();



}







	
}













?>