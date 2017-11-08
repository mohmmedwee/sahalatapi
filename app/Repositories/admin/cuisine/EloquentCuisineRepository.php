<?php
namespace App\Repositories\admin\cuisine;

use DB,Session;
use App\Models\Cuisine;
use App\Repositories\admin\cuisine\CuisineContract;

class EloquentCuisineRepository implements CuisineContract
{

    public function getByFilter($data)
    {

        $oResults = new Cuisine();

        if (isset($data['id']) && !empty($data['id'])) {
            $oResults = $oResults->where('cuisine.id', '=' , $data['id']);
        }
        if (isset($data['name_en']) && !empty($data['name_en'])) {
            $oResults = $oResults->where('cuisine.name_en', '=' , $data['name_en']);
        }
        if (isset($data['name_ar']) && !empty($data['name_ar'])) {
            $oResults = $oResults->where('cuisine.name_ar', '=' , $data['name_ar']);
        }
        if (isset($data['status']) && !empty($data['status'])) {
            $oResults = $oResults->where('cuisine.status', '=' , $data['status']);
        }
        if (isset($data['description_en']) && !empty($data['description_en'])) {
            $oResults = $oResults->where('cuisine.description_en', '=' , $data['description_en']);
        }
        if (isset($data['description_ar']) && !empty($data['description_ar'])) {
            $oResults = $oResults->where('cuisine.description_ar', '=' , $data['description_ar']);
        }
        if (isset($data['created_at']) && !empty($data['created_at'])) {
            $oResults = $oResults->where('cuisine.created_at', '=' , $data['created_at']);
        }
        if (isset($data['updated_at']) && !empty($data['updated_at'])) {
            $oResults = $oResults->where('cuisine.updated_at', '=' , $data['updated_at']);
        }


        if (isset($data['bestCuisine']) && !empty($data['bestCuisine'])) {
            $oResults=$oResults->leftJoin('dish','cuisine.id','=','dish.cuisine_id');
            $oResults=$oResults->leftJoin('cart','dish.id','=','cart.dish_id');
            $oResults = $oResults->select(['cuisine.*',DB::raw('count(cart.id) as order_number')])->groupBy('dish.cuisine_id')->orderBy('order_number','desc');
        }


        if (isset($data['order']) && !empty($data['order'])) {
            $sort = (isset($data['sort']) && !empty($data['sort'])) ? $data['sort'] : 'desc';
            $oResults = $oResults->orderBy('cuisine.'.$data['order'], $sort);
        }else{
            $oResults = $oResults->orderBy('cuisine.updated_at', 'desc');
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

          $oResults = new Cuisine();

          $oResults = $oResults->get();

$aResults=[];

foreach($oResults as $result){
$aResults[$result->id]=$result->name_en;
}
          return $aResults;
    }

    public function create($data)
    {

        $track=  new \App\Models\AuditTrack();$track->track(['action'=>'Add Cuisine','description'=>json_encode($data)]);
        $result = Cuisine::create($data);

        if ($result) {
            Session::flash('flash_message', 'cuisine added!');
            return true;
        } else {
            return false;
        }
    }

    public function show($id)
    {

$cuisine = Cuisine::findOrFail($id);

        return $cuisine;
    }

    public function destroy($id)
    {

        $track=  new \App\Models\AuditTrack();$track->track(['action'=>'Delete Cuisine','description'=>json_encode($this->show($id))]);

        $result =  Cuisine::destroy($id);

        if ($result) {
            Session::flash('flash_message', 'cuisine deleted!');
            return true;
        } else {
            return false;
        }
    }

    public function update($id,$data)
    {

        $track=  new \App\Models\AuditTrack();$track->track(['action'=>'Update Cuisine','description'=>json_encode($data->all())]);
$cuisine = Cuisine::findOrFail($id);
       $result= $cuisine->update($data->all());
        if ($result) {
            Session::flash('flash_message', 'cuisine updated!');
            return true;
        } else {
            return false;
        }

    }










   public function exportBestCuisine($request){

        if(!isset($request->exportExcel)){return false;}

        $request->merge(['getAllRecords'=>1]);
        $oResults=$this->getByFilter($request);

        $excelData=$this->BestCuisineToArray($oResults);

         ob_end_clean();
         ob_start();
        \Excel::create('BestCuisine', function($excel) use($excelData) {

            $excel->sheet('Excel sheet', function($sheet) use($excelData) {

                $sheet->fromArray($excelData);
                $sheet->setOrientation('landscape');

            });

        })->export(($request->exportExcel =='pdf')?'pdf':'xls');
    }






 public function BestCuisineToArray($oResults){

        if (isset($data['bestCuisine']) && !empty($data['bestCuisine'])) {
            $oResults=$oResults->leftJoin('dish','cuisine.id','=','dish.cuisine_id');
            $oResults=$oResults->leftJoin('cart','dish.id','=','cart.dish_id');
            $oResults = $oResults->select(['cuisine.*',DB::raw('count(cart.id) as order_number')])->groupBy('dish.cuisine_id')->orderBy('order_number','desc');
        }

        $aResults=[['id','name_en']];

        if(count($oResults)){

            foreach($oResults as $oResult){
                $aResults[]=[
                    $oResult->id ,
                    (isset($oResult->name_en))?$oResult->name_en:'' ,           

                ];

            }
        }

        return $aResults;
    }














}
