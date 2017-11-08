<?php namespace App\Http\Controllers\common\payment\knet;

use App\Http\Controllers\common\payment\knet\Pipe;
use App\Models\Knet as mKnet;

class Knet {

    public function __construct()
    {
        $this->pipe =new Pipe();
    }



    public function makePayment($amount,$trackID = "",$udf1 = "",$udf2 = "",$udf3 = "",$udf4 = "",$udf5 = "")
    {
        if(empty($trackID)) {
            $trackID = rand('100000000',999999999);
        }
        $udf1=($udf1 =="")? current_user()->getUser()->id:$udf1;
        $udf1=($udf2 =="")? current_user()->getUser()->email:$udf2;
        $udf1=($udf3 =="")? current_user()->getUser()->phone:$udf3;
        $udf1=($udf4 =="")? current_user()->getUser()->first_name:$udf4;
        // Save Sessions
        \Session::put('amount',$amount);
        \Session::put('trackID',$trackID);

        // Start Knet
        $this->pipe->setAction(1);
        $this->pipe->setCurrency(config('knet.currency'));
        $this->pipe->setLanguage(config('knet.language'));
        $this->pipe->setResponseURL(config('knet.response_link')); // set your respone page URL
        $this->pipe->setErrorURL(config('knet.error_link')); //set your error page URL
        $this->pipe->setAmt($amount); //set the amount for the transaction
        //$this->pipe->setResourcePath("/Applications/MAMP/htdocs/php-toolkit/resource/");
        $this->pipe->setResourcePath(config('knet.resources_path')); //change the path where your resource file is
        $this->pipe->setAlias(config('knet.alias')); //set your alias name here
        $this->pipe->setTrackId($trackID);//generate the random number here

        $this->pipe->setUdf1($udf1); //set User defined value
        $this->pipe->setUdf2($udf2); //set User defined value
        $this->pipe->setUdf3($udf3); //set User defined value
        $this->pipe->setUdf4($udf4); //set User defined value
        $this->pipe->setUdf5($udf5); //set User defined value


        //get results
        if($this->pipe->performPaymentInitialization()!=$this->pipe->SUCCESS){
            if(config('knet.debug')) {
                echo "Result=".$this->pipe->SUCCESS;
                echo "<br>".$this->pipe->getErrorMsg();
                echo "<br>".$this->pipe->getDebugMsg();
            } else
                return config('knet.error_link');
        }else {
            $payID = $this->pipe->getPaymentId();
            $payURL = $this->pipe->getPaymentPage();
            $knetUrl = $payURL."&PaymentID=".$payID;

            if(config('knet.debug')) {
                echo $this->pipe->getDebugMsg();
                echo $knetUrl;
                dd();
            } else{


                $paymentData=["order_id"=>$trackID,"users_id"=>current_user()->getUser()->id,"amount"=>$amount,"PaymentID"=>$this->pipe->getPaymentId(), "Result"=>$this->pipe->getResult() ,
                    "PostDate"=>$this->pipe->getDate()  ,"TranID"=>$this->pipe->getTransId(),"Auth"=>$this->pipe->getAuth() ,"Ref"=>$this->pipe-> getRef() ,"TrackID"=>$this->pipe->getTrackId() ,
                    "UDF1"=>$this->pipe->getUdf1()  ,"&UDF2"=>$this->pipe->getUdf2()   ,"&UDF3"=>$this->pipe->getUdf3()   ,"&UDF4"=>$this->pipe->getUdf4()  ,"UDF5"=>$this->pipe->getUdf5() ];
                $paymentModel=mKnet::create($paymentData)->save();

                return [$knetUrl,$payID];
            }
        }
    }

    public function makeResponse()
    {
        /*
        $all = \Input::all();

        $paymentID = \Input::get('paymentid');
        $result = \Input::get('result');
        $postdate = \Input::get('postdate');
        $tranid = \Input::get('tranid');
        $auth = \Input::get('auth');
        $ref = \Input::get('ref');
        $trackid = \Input::get('trackid');
        $udf1 = \Input::get('udf1');
        $udf2 = \Input::get('udf2');
        $udf3 = \Input::get('udf3');
        $udf4 = \Input::get('udf4');
        $udf5 = \Input::get('udf5');



        if ( $result == "CAPTURED" ) {

            $result_url = config('knet.success_link');

            $result_params = "?PaymentID=" . $paymentID . "&Result=" . $result . "&PostDate=" . $postdate . "&TranID=" . $tranid . "&Auth=" . $auth . "&Ref=" . $ref . "&TrackID=" . $trackid . "&UDF1=" . $udf1 . "&UDF2=" .$udf2  . "&UDF3=" . $udf3  . "&UDF4=" . $udf4 . "&UDF5=" . $udf5  ;
            $paid = true;
        } else {
            $result_url = config('knet.error_link');
            $result_params = "?PaymentID=" . $paymentID . "&Result=" . $result . "&PostDate=" . $postdate . "&TranID=" . $tranid . "&Auth=" . $auth . "&Ref=" . $ref . "&TrackID=" . $trackid . "&UDF1=" . $udf1 . "&UDF2=" .$udf2  . "&UDF3=" . $udf3  . "&UDF4=" . $udf4 . "&UDF5=" . $udf5  ;
            $paid = false;
        }

        $returns = [
            'url' => "REDIRECT=".$result_url.$result_params,
            // 'amount' => \Session::get('amount'),
            'trackID' => $trackid,
            'paid' => $paid,
            'data' => $all,
        ];
        // \Session::forget('amount');
        // \Session::forget('trackID');
        return $returns;
*/
    }
}