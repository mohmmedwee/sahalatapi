<?php

namespace App\module\notification\admin\controller\sms;

class SendSms {



   public static  function  send($phone,$message)
   {


     $url = 'http://62.150.26.41/SmsWebService.asmx/send?username='
         .config('module.sms_username').
         '&password='.config('module.sms_password').
         '&token='.config('module.sms_token').
         '&sender='.config('module.sms_sender').
         '&message='.$message.
         '&dst='.$phone.
         '&type='.config('module.sms_type').
         '&coding='.config('module.sms_coding').
         '&datetime='.config('module.sms_datetime');

       $result=self::requestUrl($url);

   }

    public static function requestUrl($url){



        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec ($ch);
        $info = curl_getinfo($ch);
        $http_result = $info ['http_code'];
        curl_close ($ch);

        return $http_result;
    }

}