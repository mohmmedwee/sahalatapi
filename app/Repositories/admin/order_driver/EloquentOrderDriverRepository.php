<?php
namespace App\Repositories\admin\order_driver;

use App\Models\Order;
use Session;
use App\Models\OrderDriver;
use App\Repositories\admin\order_driver\OrderDriverContract;

class EloquentOrderDriverRepository implements OrderDriverContract
{

    public function getByFilter($data)
    {

        $oResults = new OrderDriver();


        if(canAccess('admin.order.allData')){

        }elseif(canAccess('admin.order.groupData')){

            $oResults = $oResults->whereIn('order_driver.order_id', current_user()->getRestaurantOrder());
        }elseif(canAccess('admin.order.userData')){
            $oResults= $oResults::where('order_driver.users_id','=',current_user()->getUser()->id);
        }



        if (isset($data['id']) && !empty($data['id'])) {
            $oResults = $oResults->where('order_driver.id', '=' , $data['id']);
        }
        if (isset($data['users_id']) && !empty($data['users_id'])) {
            $oResults = $oResults->where('order_driver.users_id', '=' , $data['users_id']);
        }
        if (isset($data['order_id']) && !empty($data['order_id'])) {
            $oResults = $oResults->where('order_driver.order_id', '=' , $data['order_id']);
        }
        if (isset($data['current_long']) && !empty($data['current_long'])) {
            $oResults = $oResults->where('order_driver.current_long', '=' , $data['current_long']);
        }
        if (isset($data['current_lat']) && !empty($data['current_lat'])) {
            $oResults = $oResults->where('order_driver.current_lat', '=' , $data['current_lat']);
        }
        if (isset($data['status']) &&  $data['status']!=='') {
            $oResults = $oResults->where('order_driver.status', '=' , $data['status']);
        }
        if (isset($data['note']) && !empty($data['note'])) {
            $oResults = $oResults->where('order_driver.note', 'like' , '%'.$data['note'].'%');
        }
        if (isset($data['notification']) &&  $data['notification']!=='') {
            $oResults = $oResults->where('order_driver.notification', '=' , $data['notification']);
        }
        if (isset($data['created_at']) && !empty($data['created_at'])) {
            $oResults = $oResults->where('order_driver.created_at', '=' , $data['created_at']);
        }
        if (isset($data['updated_at']) && !empty($data['updated_at'])) {
            $oResults = $oResults->where('order_driver.updated_at', '=' , $data['updated_at']);
        }

        if (isset($data['period_type']) && !empty($data['period_type'])) {

            $period_prefix = [
                '' => '',
                'daily' => gmdate('Y-m-d '),
                'monthly' => gmdate('Y-m-'),
                'yearly' => gmdate('Y-')
            ];
            $oResults = $oResults->where('order_driver.created_at', 'like', $period_prefix[$data['period_type']] . '%');
        }

        if (isset($data['from_date']) && !empty($data['from_date'])) {
            $oResults = $oResults->where('order_driver.created_at', '>=', $data['from_date']);
        }

        if (isset($data['to_date']) && !empty($data['to_date'])) {
            $oResults = $oResults->where('order_driver.created_at', '<=', $data['to_date']);
        }

        if( isset($data['cloneQuery']) && !empty($data['cloneQuery'])){
            return clone $oResults;
        }

        if (isset($data['order']) && !empty($data['order'])) {
            $sort = (isset($data['sort']) && !empty($data['sort'])) ? $data['sort'] : 'desc';
            $oResults = $oResults->orderBy('order_driver.'.$data['order'], $sort);
        }else{
            $oResults = $oResults->orderBy('order_driver.updated_at', 'desc');
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

        $oResults = new OrderDriver();

        $oResults = $oResults->get();

        $aResults=[];

        foreach($oResults as $result){
            $aResults[$result->id]=$result->name;
        }
        return $aResults;
    }

    public function getDrivers($data=[]){

        $oResults =  OrderDriver::with('users');

        $oResults = $oResults->distinct('users_id')->get();

        $aResults=[];

        foreach($oResults as $result){
            $aResults[$result->users_id]=isset($result->users->id)? $result->users->first_name . ' '. $result->users->last_name:'';
        }
        return $aResults;
    }

    public function create($data)
    {

        $track=  new \App\Models\AuditTrack();$track->track(['action'=>'Add Order to driver','description'=>json_encode($data)]);


        $result = OrderDriver::create($data);

        if ($result) {
            Session::flash('flash_message', 'order_driver added!');
            return true;
        } else {
            return false;
        }
    }

    public function show($id)
    {

        $order_driver = OrderDriver::findOrFail($id);

        OrderDriver::find($id)->update(['notification'=>1]);
        return $order_driver;
    }

    public function destroy($id)
    {

        $track=  new \App\Models\AuditTrack();$track->track(['action'=>'Delete Order Driver','description'=>json_encode($this->show($id))]);
        $result =  OrderDriver::destroy($id);

        if ($result) {
            Session::flash('flash_message', 'order_driver deleted!');
            return true;
        } else {
            return false;
        }
    }

    public function update($id,$data)
    {
$data=is_array($data)? $data:$data->all();
        $track=  new \App\Models\AuditTrack();$track->track(['action'=>'Update Order Driver','description'=>json_encode($data)]);



        $order_driver = OrderDriver::findOrFail($id);


        if(isset($data['status']) && $data['status']== config('array.order_driver_status_reject_index') && $data['status']!=$order_driver->status ){
Order::find($order_driver->order_id)->update(['status'=>config('array.order_status_payed_index')]);
        }elseif(isset($data['status']) && $data['status']== config('array.order_driver_status_assigned_index') && $data['status']!=$order_driver->status){

            Order::find($order_driver->order_id)->update(['status'=>config('array.order_status_delivering_index')]);
        }

        $result= $order_driver->update($data);



        if ($result) {
            Session::flash('flash_message', 'order_driver updated!');
            return true;
        } else {
            return false;
        }

    }


    public function successDeliverTaskChart($request){

        $request->merge(['cloneQuery'=>1]);
        $oResults=$this->getByFilter($request);

        $oResults=$oResults->join('order','order.id','=','order_driver.order_id')
            ->whereIn('order.status',config('array.order_status_success_group'))
            ->groupBy('order_driver.delivering_id')
            ->select([\DB::raw('count(order_driver.delivering_id) as orderNumber'),\DB::raw('date(order_driver.created_at) as deliver_date')])
            ->orderBy('deliver_date')
            ->get();



        $colors=config('array.chartColor');




        $aHorizontalLine=[];
        $verticalData=[];
        $selectedNumberGroup=[1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20];
        $selectedNumberGroupLabel=[1=>'Single Orders',2=>'Double Orders',3=>'Triple Orders',4=>'Four Orders',5=>'Five Orders',6=>'Six Orders',7=>'Seven Orders',
        8=>'8 orders',9=>'9 orders',10=>'10 Orders',11=>'11 Orders',12=>'12 Orders',13=>'13 Orders'];
        $realGroups=[];
        foreach ($oResults as $oResult) {
            if(!in_array($oResult->deliver_date,$aHorizontalLine)){$aHorizontalLine[]=$oResult->deliver_date;}
            if(!in_array($oResult->orderNumber,$selectedNumberGroup)){$selectedNumberGroup[]=$oResult->orderNumber;}


            if(!isset($verticalData[$oResult->deliver_date][$oResult->orderNumber])){$verticalData[$oResult->deliver_date][$oResult->orderNumber]=0;}
            $verticalData[$oResult->deliver_date][$oResult->orderNumber]+=$oResult->orderNumber;
            $realGroups[$oResult->orderNumber]=$oResult->orderNumber;
        }

asort($realGroups);
        $selectedNumberGroup=isset($request->selectedNumberGroup)? $request->selectedNumberGroup:$selectedNumberGroup;

        $columnsData=[];
        $i=0;
        foreach ($realGroups as $oneSelectedNumberGroup) {
            $oneStageDate=[];
            foreach($verticalData as $oneVerticalData){
                $oneStageDate[]=array_key_exists($oneSelectedNumberGroup,$oneVerticalData)? $oneVerticalData[$oneSelectedNumberGroup]:0;
            }
            $selectedColor=isset($colors[$i])? $colors[$i]:$colors[1];
            $columnsData[]= [
                'label'=> isset($selectedNumberGroupLabel[$oneSelectedNumberGroup])? $selectedNumberGroupLabel[$oneSelectedNumberGroup]:$oneSelectedNumberGroup." Order together",
                'name'=>isset($selectedNumberGroupLabel[$oneSelectedNumberGroup])? $selectedNumberGroupLabel[$oneSelectedNumberGroup]:$oneSelectedNumberGroup." Order together",
                'fillColor'=>$selectedColor,
                'strokeColor'=>$selectedColor,
                'highlightFill'=>$selectedColor,
                'highlightStroke'=>$selectedColor,
                'data'=>$oneStageDate,
            ];
            $i++;

        }


        $oChartData=[
'chartLeftLabel'=>trans('order_driver.numberOfDeliver'),
            'aHorizontalLine' => $aHorizontalLine,
            'data'=>$columnsData

        ];


        return $oChartData;
    }









    public function unsuccessDeliverTaskChart($request){

        $request->merge(['cloneQuery'=>1]);
        $oResults=$this->getByFilter($request);

        $oResults=$oResults->join('order','order.id','=','order_driver.order_id')
            ->whereIn('order.status',config('array.order_status_unsuccess_group'))
            ->groupBy('order_driver.delivering_id')
            ->select([\DB::raw('count(order_driver.delivering_id) as orderNumber'),\DB::raw('date(order_driver.created_at) as deliver_date')])
            ->orderBy('deliver_date')
            ->get();



        $colors=config('array.chartColor');




        $aHorizontalLine=[];
        $verticalData=[];

        $selectedNumberGroup=[1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20];
        $selectedNumberGroupLabel=[1=>'Single Orders',2=>'Double Orders',3=>'Triple Orders',4=>'Four Orders',5=>'Five Orders',6=>'Six Orders',7=>'Seven Orders',
            8=>'8 orders',9=>'9 orders',10=>'10 Orders',11=>'11 Orders',12=>'12 Orders',13=>'13 Orders'];

        $realGroups=[];
        foreach ($oResults as $oResult) {
            if(!in_array($oResult->deliver_date,$aHorizontalLine)){$aHorizontalLine[]=$oResult->deliver_date;}
            if(!in_array($oResult->orderNumber,$selectedNumberGroup)){$selectedNumberGroup[]=$oResult->orderNumber;}

            if(!isset($verticalData[$oResult->deliver_date][$oResult->orderNumber])){$verticalData[$oResult->deliver_date][$oResult->orderNumber]=0;}
            $verticalData[$oResult->deliver_date][$oResult->orderNumber]+=$oResult->orderNumber;
            $realGroups[$oResult->orderNumber]=$oResult->orderNumber;
        }

        asort($realGroups);

        $selectedNumberGroup=isset($request->selectedNumberGroup)? $request->selectedNumberGroup:$selectedNumberGroup;

        $columnsData=[];
        $i=0;
        foreach ($realGroups as $oneSelectedNumberGroup) {
            $oneStageDate=[];
            foreach($verticalData as $oneVerticalData){
                $oneStageDate[]=array_key_exists($oneSelectedNumberGroup,$oneVerticalData)? $oneVerticalData[$oneSelectedNumberGroup]:0;
            }
            $selectedColor=isset($colors[$i])? $colors[$i]:$colors[1];
            $columnsData[]= [
                'label'=>isset($selectedNumberGroupLabel[$oneSelectedNumberGroup])? $selectedNumberGroupLabel[$oneSelectedNumberGroup]:$oneSelectedNumberGroup." Order together",
                'name'=>isset($selectedNumberGroupLabel[$oneSelectedNumberGroup])? $selectedNumberGroupLabel[$oneSelectedNumberGroup]:$oneSelectedNumberGroup." Order together",
                'fillColor'=>$selectedColor,
                'strokeColor'=>$selectedColor,
                'highlightFill'=>$selectedColor,
                'highlightStroke'=>$selectedColor,
                'data'=>$oneStageDate,
            ];
            $i++;

        }


        $oChartData=[

            'aHorizontalLine' => $aHorizontalLine,
            'data'=>$columnsData,
            'chartLeftLabel'=>trans('order_driver.numberOfDeliver'),
        ];


        return $oChartData;
    }






    public function successDistanceDeliverTaskChart($request){

        $request->merge(['cloneQuery'=>1]);
        $oResults=$this->getByFilter($request);

        $oResults=$oResults->join('order','order.id','=','order_driver.order_id')
            ->whereIn('order.status',config('array.order_status_success_group'))
            ->select(['order_driver.deliver_distance',\DB::raw('date(order_driver.created_at) as deliver_date')])
            ->orderBy('deliver_date')
            ->get();



        $colors=config('array.chartColor');



        $selectedNumberGroup=isset($request->selectedNumberGroup)? $request->selectedNumberGroup:[15,30,100000];

        $aHorizontalLine=[];
        $verticalData=[];

        foreach ($oResults as $oResult) {
            if(!in_array($oResult->deliver_date,$aHorizontalLine)){$aHorizontalLine[]=$oResult->deliver_date;}

            $group=0;
            foreach($selectedNumberGroup as $key=>$value){
                if($oResult->deliver_distance <$value){$group=$key;break;}
            }
            if(!isset($verticalData[$oResult->deliver_date][$group])){$verticalData[$oResult->deliver_date][$group]=0;}
            $verticalData[$oResult->deliver_date][$group]+=1;

        }

        $columnsData=[];
        $i=0;
        foreach ($selectedNumberGroup as $oneSelectedNumberGroup=>$value) {
            $oneStageDate=[];
            foreach($verticalData as $oneVerticalData){
                $oneStageDate[]=array_key_exists($oneSelectedNumberGroup,$oneVerticalData)? $oneVerticalData[$oneSelectedNumberGroup]:0;
            }

            $columnsData[]= [
                'label'=> ($value == 100000 )? 'More than 30 KM': " less than ".$value."KM",
                'name'=>($value == 100000 )? 'More than 30 KM': " less than ".$value."KM",
                'fillColor'=>$colors[$i],
                'strokeColor'=>$colors[$i],
                'highlightFill'=>$colors[$i],
                'highlightStroke'=>$colors[$i],
                'data'=>$oneStageDate,
            ];
            $i++;

        }


        $oChartData=[

            'aHorizontalLine' => $aHorizontalLine,
            'data'=>$columnsData,
'chartLeftLabel'=>trans('order_driver.numberOfDeliverPerDistance'),
        ];


        return $oChartData;
    }


    public function unsuccessDistanceDeliverTaskChart($request){

        $request->merge(['cloneQuery'=>1]);
        $oResults=$this->getByFilter($request);

        $oResults=$oResults->join('order','order.id','=','order_driver.order_id')
            ->whereIn('order.status',config('array.order_status_unsuccess_group'))
            ->select(['order_driver.deliver_distance',\DB::raw('date(order_driver.created_at) as deliver_date')])
            ->orderBy('deliver_date')
            ->get();



        $colors=config('array.chartColor');



        $selectedNumberGroup=isset($request->selectedNumberGroup)? $request->selectedNumberGroup:[15,30,100000];

        $aHorizontalLine=[];
        $verticalData=[];

        foreach ($oResults as $oResult) {
            if(!in_array($oResult->deliver_date,$aHorizontalLine)){$aHorizontalLine[]=$oResult->deliver_date;}

            $group=0;
            foreach($selectedNumberGroup as $key=>$value){
                if($oResult->deliver_distance <$value){$group=$key;break;}
            }
            if(!isset($verticalData[$oResult->deliver_date][$group])){$verticalData[$oResult->deliver_date][$group]=0;}
            $verticalData[$oResult->deliver_date][$group]+=1;

        }

        $columnsData=[];
        $i=0;
        foreach ($selectedNumberGroup as $oneSelectedNumberGroup=>$value) {
            $oneStageDate=[];
            foreach($verticalData as $oneVerticalData){
                $oneStageDate[]=array_key_exists($oneSelectedNumberGroup,$oneVerticalData)? $oneVerticalData[$oneSelectedNumberGroup]:0;
            }

            $columnsData[]= [

                'label'=>($value == 100000 )? 'More than 30 KM': " less than ".$value."KM",
                'name'=>($value == 100000 )? 'More than 30 KM': " less than ".$value."KM",
                'fillColor'=>$colors[$i],
                'strokeColor'=>$colors[$i],
                'highlightFill'=>$colors[$i],
                'highlightStroke'=>$colors[$i],
                'data'=>$oneStageDate,
            ];
            $i++;

        }


        $oChartData=[

            'aHorizontalLine' => $aHorizontalLine,
            'data'=>$columnsData,
            'chartLeftLabel'=>trans('order_driver.numberOfDeliverPerDistance'),
        ];


        return $oChartData;
    }
    public function successTimeDeliverTaskChart($request){

        $request->merge(['cloneQuery'=>1]);
        $oResults=$this->getByFilter($request);

        $oResults=$oResults->join('order','order.id','=','order_driver.order_id')
            ->whereIn('order.status',config('array.order_status_success_group'))
            ->select(['order_driver.deliver_time',\DB::raw('date(order_driver.created_at) as deliver_date')])
            ->orderBy('deliver_date')
            ->get();



        $colors=config('array.chartColor');



        $selectedNumberGroup=isset($request->selectedNumberGroup)? $request->selectedNumberGroup:[15,30,100000];

        $aHorizontalLine=[];
        $verticalData=[];

        foreach ($oResults as $oResult) {
            if(!in_array($oResult->deliver_date,$aHorizontalLine)){$aHorizontalLine[]=$oResult->deliver_date;}

            $group=0;
            foreach($selectedNumberGroup as $key=>$value){
                if($oResult->deliver_time<$value){$group=$key;break;}
            }
            if(!isset($verticalData[$oResult->deliver_date][$group])){$verticalData[$oResult->deliver_date][$group]=0;}
            $verticalData[$oResult->deliver_date][$group]+=1;

        }

        $columnsData=[];
        $i=0;
        foreach ($selectedNumberGroup as $oneSelectedNumberGroup=>$value) {
            $oneStageDate=[];
            foreach($verticalData as $oneVerticalData){
                $oneStageDate[]=array_key_exists($oneSelectedNumberGroup,$oneVerticalData)? $oneVerticalData[$oneSelectedNumberGroup]:0;
            }


            $columnsData[]= [
                'label'=>($value ==100000)? "More than 30 Minute":" less than ".$value." Minute",
                'name'=> ($value ==100000)? "More than 30 Minute":" less than ".$value." Minute",
                'fillColor'=>$colors[$i],
                'strokeColor'=>$colors[$i],
                'highlightFill'=>$colors[$i],
                'highlightStroke'=>$colors[$i],
                'data'=>$oneStageDate,
            ];
            $i++;

        }


        $oChartData=[

            'aHorizontalLine' => $aHorizontalLine,
            'data'=>$columnsData,
            'chartLeftLabel'=>trans('order_driver.numberOfDeliverPerTime'),
        ];


        return $oChartData;
    }
    public function unsuccessTimeDeliverTaskChart($request){

        $request->merge(['cloneQuery'=>1]);
        $oResults=$this->getByFilter($request);

        $oResults=$oResults->join('order','order.id','=','order_driver.order_id')
            ->whereIn('order.status',config('array.order_status_unsuccess_group'))
            ->select(['order_driver.deliver_time',\DB::raw('date(order_driver.created_at) as deliver_date')])
            ->orderBy('deliver_date')
            ->get();



        $colors=config('array.chartColor');



        $selectedNumberGroup=isset($request->selectedNumberGroup)? $request->selectedNumberGroup:[15,30,100000];

        $aHorizontalLine=[];
        $verticalData=[];

        foreach ($oResults as $oResult) {
            if(!in_array($oResult->deliver_date,$aHorizontalLine)){$aHorizontalLine[]=$oResult->deliver_date;}

            $group=0;
            foreach($selectedNumberGroup as $key=>$value){
                if($oResult->deliver_time<$value){$group=$key;break;}
            }
            if(!isset($verticalData[$oResult->deliver_date][$group])){$verticalData[$oResult->deliver_date][$group]=0;}
            $verticalData[$oResult->deliver_date][$group]+=1;

        }

        $columnsData=[];
        $i=0;
        foreach ($selectedNumberGroup as $oneSelectedNumberGroup=>$value) {
            $oneStageDate=[];
            foreach($verticalData as $oneVerticalData){
                $oneStageDate[]=array_key_exists($oneSelectedNumberGroup,$oneVerticalData)? $oneVerticalData[$oneSelectedNumberGroup]:0;
            }

            $columnsData[]= [
                'label'=>($value ==100000)? "More than 30 Minute":" less than ".$value." Minute",
                'name'=>($value ==100000)? "More than 30 Minute":" less than ".$value." Minute",
                'fillColor'=>$colors[$i],
                'strokeColor'=>$colors[$i],
                'highlightFill'=>$colors[$i],
                'highlightStroke'=>$colors[$i],
                'data'=>$oneStageDate,
            ];
            $i++;

        }


        $oChartData=[

            'aHorizontalLine' => $aHorizontalLine,
            'data'=>$columnsData,
            'chartLeftLabel'=>trans('order_driver.numberOfDeliverPerTime'),
        ];


        return $oChartData;
    }


    public function distanceWithReturnChart($request){

        $request->merge(['cloneQuery'=>1]);
        $oResults=$this->getByFilter($request);

        $oResults=$oResults->join('order','order.id','=','order_driver.order_id');

        // $oResults=$oResults ->whereIn('order.status',config('array.order_status_success_group'));

        $oResults=$oResults->select([\DB::raw('date(order_driver.created_at) as deliver_date'),\DB::raw('sum(order_driver.deliver_distance) as totalDistance'),
            \DB::raw('sum(order_driver.return_distance) as totalReturnDistance')])
            ->groupBy('deliver_date')
            ->orderBy('deliver_date')
            ->get();



        $colors=config('array.chartColor');



        $selectedNumberGroup=isset($request->selectedNumberGroup)? $request->selectedNumberGroup:[0,1];

        $aHorizontalLine=[];
        $verticalData=[];

        foreach ($oResults as $oResult) {
            if(!in_array($oResult->deliver_date,$aHorizontalLine)){$aHorizontalLine[]=$oResult->deliver_date;}



            $verticalData[$oResult->deliver_date][0]=$oResult->totalDistance;
            $verticalData[$oResult->deliver_date][1]=$oResult->totalReturnDistance;

        }

        $columnsData=[];
        $i=0;
        foreach ($selectedNumberGroup as $oneSelectedNumberGroup) {
            $oneStageDate=[];
            foreach($verticalData as $oneVerticalData){
                $oneStageDate[]=array_key_exists($oneSelectedNumberGroup,$oneVerticalData)? $oneVerticalData[$oneSelectedNumberGroup]:0;
            }

            $columnsData[]= [
                'label'=> ($oneSelectedNumberGroup == 0)? 'Go Direction':"Return Direction",
                'name'=> ($oneSelectedNumberGroup == 0)? 'Go Direction':"Return Direction",
                'fillColor'=>$colors[$i],
                'strokeColor'=>$colors[$i],
                'highlightFill'=>$colors[$i],
                'highlightStroke'=>$colors[$i],
                'data'=>$oneStageDate,
            ];
            $i++;

        }


        $oChartData=[

            'aHorizontalLine' => $aHorizontalLine,
            'data'=>$columnsData,
            'chartLeftLabel'=>trans('order_driver.distanceKM'),
        ];


        return $oChartData;
    }

    public function timeWithReturnChart($request){

        $request->merge(['cloneQuery'=>1]);
        $oResults=$this->getByFilter($request);

        $oResults=$oResults->join('order','order.id','=','order_driver.order_id');

        // $oResults=$oResults ->whereIn('order.status',config('array.order_status_success_group'));

        $oResults=$oResults->select([\DB::raw('date(order_driver.created_at) as deliver_date'),\DB::raw('sum(order_driver.deliver_time) as totalTime'),
            \DB::raw('sum(order_driver.return_time) as totalReturnTime')])
            ->groupBy('deliver_date')
            ->orderBy('deliver_date')
            ->get();



        $colors=config('array.chartColor');



        $selectedNumberGroup=isset($request->selectedNumberGroup)? $request->selectedNumberGroup:[0,1];

        $aHorizontalLine=[];
        $verticalData=[];

        foreach ($oResults as $oResult) {
            if(!in_array($oResult->deliver_date,$aHorizontalLine)){$aHorizontalLine[]=$oResult->deliver_date;}



            $verticalData[$oResult->deliver_date][0]=$oResult->totalTime;
            $verticalData[$oResult->deliver_date][1]=$oResult->totalReturnTime;

        }

        $columnsData=[];
        $i=0;
        foreach ($selectedNumberGroup as $oneSelectedNumberGroup) {
            $oneStageDate=[];
            foreach($verticalData as $oneVerticalData){
                $oneStageDate[]=array_key_exists($oneSelectedNumberGroup,$oneVerticalData)? $oneVerticalData[$oneSelectedNumberGroup]:0;
            }

            $columnsData[]= [
                'label'=> ($oneSelectedNumberGroup == 0)? 'Go Time':"Return Time",
                'name'=> ($oneSelectedNumberGroup == 0)? 'Go Time':"Return Time",
                'fillColor'=>$colors[$i],
                'strokeColor'=>$colors[$i],
                'highlightFill'=>$colors[$i],
                'highlightStroke'=>$colors[$i],
                'data'=>$oneStageDate,
            ];
            $i++;

        }


        $oChartData=[

            'aHorizontalLine' => $aHorizontalLine,
            'data'=>$columnsData,
            'chartLeftLabel'=>trans('order_driver.timeMinute'),
        ];


        return $oChartData;
    }


    public function totalDutyTime($request){


        $request->merge(['cloneQuery'=>1]);
        $oResults=$this->getByFilter($request);

        $oResults=$oResults->with(['users','order'])->join('order','order.id','=','order_driver.order_id');

        // $oResults=$oResults ->whereIn('order.status',config('array.order_status_success_group'));

        $oResults=$oResults->select([
            'order_driver.users_id',
            'order_driver.deliver_time',

        ])
            // ->groupBy('order_driver.users_id')
            ->orderBy('order_driver.created_at')
            ->get();



        $colors=config('array.chartColor');



        $selectedNumberGroup=isset($request->selectedNumberGroup)? $request->selectedNumberGroup:[0,1];

        $aHorizontalLine=[];
        $verticalData=[];
        $driverDays=[];

        foreach ($oResults as $oResult) {
            $working_time_from=isset($oResult->order->resturant->working_time_from)?$oResult->order->resturant->working_time_from :'08:00';
            $working_time_to=isset($oResult->order->resturant->working_time_to)?$oResult->order->resturant->working_time_to :'20:00';
            $totalRestaurantWorkingTime=(strtotime($working_time_to) - strtotime($working_time_from))/60;

            if(!array_key_exists($oResult->users_id,$driverDays)){$aHorizontalLine[]=isset($oResult->users->first_name)?$oResult->users->first_name:'Driver #'.$oResult->users_id;}


            if(!isset( $verticalData[$oResult->users_id][0])){ $verticalData[$oResult->users_id][0]=0;}
            $verticalData[$oResult->users_id][0]+=$oResult->deliver_time;

            if(!isset( $verticalData[$oResult->users_id][1])){ $verticalData[$oResult->users_id][1]=$totalRestaurantWorkingTime;}
            if(!isset($driverDays[$oResult->users_id]) || (isset($driverDays[$oResult->users_id]) && !array_key_exists($oResult->deliver_date,$driverDays[$oResult->users_id]))){ $verticalData[$oResult->users_id][1]+=$totalRestaurantWorkingTime;}
            $verticalData[$oResult->users_id][1]-=$oResult->deliver_time;

            $driverDays[$oResult->users_id][$oResult->deliver_date]=$oResult->deliver_date;
        }

        $columnsData=[];
        $i=0;
        foreach ($selectedNumberGroup as $oneSelectedNumberGroup) {
            $oneStageDate=[];
            foreach($verticalData as $oneVerticalData){
                $oneStageDate[]=array_key_exists($oneSelectedNumberGroup,$oneVerticalData)? $oneVerticalData[$oneSelectedNumberGroup]:0;
            }

            $columnsData[]= [
                'label'=> ($oneSelectedNumberGroup == 0)? 'Work Time':"Free Time",
                'name'=> ($oneSelectedNumberGroup == 0)? 'Work Time':"Free Time",
                'fillColor'=>$colors[$i],
                'strokeColor'=>$colors[$i],
                'highlightFill'=>$colors[$i],
                'highlightStroke'=>$colors[$i],
                'data'=>$oneStageDate,
            ];
            $i++;

        }


        $oChartData=[

            'aHorizontalLine' => $aHorizontalLine,
            'data'=>$columnsData,
            'chartLeftLabel'=>trans('order_driver.timeMinute'),
        ];


        return $oChartData;
    }


    public function driverAttendChart($request){



        $request->merge(['cloneQuery'=>1]);
        $oResults=$this->getByFilter($request);

        $oResults=$oResults->with(['users']);

        // $oResults=$oResults ->whereIn('order.status',config('array.order_status_success_group'));

        $oResults=$oResults->select([
            'order_driver.users_id',
            \DB::raw('GROUP_CONCAT(order_driver.deliver_start_hour) as aStart'),
            \DB::raw('GROUP_CONCAT(order_driver.deliver_end_hour) as aEnd'),


        ])
           ->groupBy('order_driver.users_id')
            ->orderBy('order_driver.deliver_start_hour')
            ->get();
$chartData=[];
        foreach($oResults as $oResult){


            $times=[];
            $ends=explode(',',$oResult->aEnd);
            foreach(explode(',',$oResult->aStart) as $key=>$start){
                if(strlen($start) <4 || strlen($ends[$key])<4){continue;}
                $times[]=["starting_time"=> $start, "ending_time"=>$ends[$key]];
            }
            $chartData[]=  [
                'label'=>isset($oResult->users->id)? $oResult->users->first_name.' '.$oResult->users->last_name:' Driver #'.$oResult->users_id,
            'times'=>$times
            ];

        }


        return $chartData;
    }










   public function exportorderdriver($request){

        if(!isset($request->exportExcel)){return false;}

          

        $request->merge(['getAllRecords'=>1]);

        $oResults=$this->getByFilter($request);

        $excelData=$this->orderDreiverToArray($oResults);

         ob_end_clean();
         ob_start();
        \Excel::create('Order Driver', function($excel) use($excelData) {

            $excel->sheet('Excel sheet', function($sheet) use($excelData) {

                $sheet->fromArray($excelData);
                $sheet->setOrientation('landscape');
                $sheet->setAllBorders('thin');

            });

        })->export(($request->exportExcel =='pdf')?'pdf':'xls');
    }



 public function orderDreiverToArray($oResults){
 $aResults=[['ID','Driver Name','Order id','Status','notification','updated at']];

        if(count($oResults)){

            foreach($oResults as $oResult){
                $aResults[]=[
                    $oResult->id ,
                    (isset($oResult->users->first_name))?$oResult->users->first_name:'' ,
                     (isset($oResult->order_id)) ?$oResult->order_id:'' ,
            (array_key_exists($oResult->status,config('array.order_driver_status')))?config('array.order_driver_status')[$oResult->status]:'',
             (array_key_exists($oResult->notification,config('array.order_notification')))?config('array.order_notification')[$oResult->notification]:'',

                $oResult->updated_at ,
            
                ];




            }
        }
        return $aResults;
    }













































}
