<?php

namespace App\Http\Controllers\common\email;

use App\Models\Mt4User;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;
use Mail;
use App\Models\SettingsMassMail;
use App\Models\User;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Modules\Request\Entities\SettingsEmailTemplates;
use App\Models\common\email\EmailTemplate;
use App\Models\AccountsBank;
use Session;
use App\Http\Controllers\common\email\GetEmailDataController as EmailData;

class EmailController extends Controller
{

    protected $fromEmail = '';
    protected $fromName = '';

    public function __construct()
    {
        $this->fromEmail = config('mail.fromEmail');
        $this->fromName = config('mail.fromName');

    }



    public function replaceTemplateVariables($emailBody, $aTemplateVariables)
    {


        foreach ($aTemplateVariables as $key => $value) {
           // if(!is_string($value)){continue;}
            if (is_array($key) || is_array($value)) {
                continue;
            }

            $emailBody = preg_replace
            ('/\{\{[\s]*\$' . $key . '[\s]*\}\}/i',
                $value,
                $emailBody);
        }

        return $emailBody;
    }

    public function sendEmailWithPdf($info)
    {


        Mail::raw($info['subject'], function ($message) use ($info) {

            $message->from( $this->fromEmail ,  $this->fromName );

            $message->getHeaders()->addTextHeader('Content-type', 'text/html');
            $message->to($info['to']);
            $message->subject($info['subject']);
            if (array_key_exists('bcc', $info)) {
                $message->bcc($info['bcc']);
            }

            if (isset($info['pdfPath'])) {

                $message->attach($info['pdfPath'], array(
                    'as' => $info['subject'] . '.pdf',
                    'mime' => 'application/pdf'));
            }
            $message->setBody($info['content'], 'text/html');
        });


    }


    public function createPdfFromText($name, $html)
    {
        $name = preg_replace("/[\s-]/", "_", $name);

        $htmlName = $name . '_' . rand(0, 99999) . rand(0, 99999) . '.html';
        $htmlPath = public_path() . '/tempHtml/' . $htmlName;
        $html = $html;
        file_put_contents($htmlPath, $html);
        $pdfPath = public_path() . '/pdf/' . explode('.', basename($htmlPath))[0] . '.pdf';


        $pdfPath = public_path() . '/pdf/' . explode('.', basename($htmlPath))[0] . '.pdf';


        exec('"' . Config('project.htmlToPdfPath') . '" "' . $htmlPath . '" "' . $pdfPath . '"');

        return $pdfPath;
    }










public function arrayToString($array){
    $emailBody='';
    foreach ($array as $key => $value) {
        if(is_array($value)){
            $emailBody .=$this->arrayToString($value);continue;
        }
        if(is_array($key)){
            $emailBody .=$this->arrayToString($key);continue;
        }
        $key=(!is_string($key)  && !is_numeric($key)) ? '':$key;
        $value=(!is_string($value)  && !is_numeric($value)) ? '':$value;

        $emailBody .= $key . ' : ' . $value . '<br>';
    }
    return $emailBody;
}




    public function renderEmailDataAndSend($templateName,$data,$type)
    {
        $mail = EmailTemplate::where([
            'name' => $templateName,
            'language' => Session::get('locale'),
            'type'=>$type,
            'status'=>$data['status']
        ])->first();

        $emailBody = '';
        if (count($mail)) {


            $emailBody = $this->replaceTemplateVariables($mail->body, $data);

        } else {
         //  return false;
            $emailBody= $this->arrayToString($data);

            $mail=new   EmailTemplate();
            $mail->subject = $templateName;
            $mail->name = $templateName;
            $mail->language = Session::get('locale');
            $mail->status = $data['status'];
            $mail->body = $emailBody;
            $mail->type = $type;
            $mail->to_field = '';
            $mail->to_email= config('project.adminEmail');
            $mail->save();


        }

        $toEmail=(array_key_exists( $mail->to_field,$data))? $data[$mail->to_field]:'';

        $toEmailArray=explode(',',$mail->to_email);

        $info=[];
        if(count($toEmailArray)> 0  && trim($mail->to_email) !='' ){
            $info['bcc']=[];
            $iStart=1;
           if($toEmail==''){
               $toEmail=$toEmailArray[0];
           }
           else{
               $iStart=0;
           }

            for($i=$iStart;$i<count($toEmailArray);$i++){
                $info['bcc'][]=$toEmailArray[$i];//[config('fxweb.adminEmail')];
            }

    }elseif($toEmail==''){
            $toEmail=config('fxweb.adminEmail');
        }

        $info += [
            'to' => $toEmail,
            'subject' => $mail->subject,
            'from' => $this->fromEmail,
            'fromName' => $this->fromName,
            'content' => $emailBody
        ];


        $pdfTemplate = EmailTemplate::where([
            'name' => $templateName,
            'language' => Session::get('locale'),
            'type'=>($type*1 +2),
            'status'=>$data['status']

        ])->first();

        if (count($pdfTemplate)) {
            $pdfTemplateBody = $this->replaceTemplateVariables($pdfTemplate->mail, $data);
            $info['pdfPath'] = $this->createPdfFromText($pdfTemplate->title, $pdfTemplateBody);
        }

        $this->sendEmailWithPdf($info );

    }


public function sendExpiredContract($templateInfo){
    $emailData=new EmailData();
    $data=$emailData->expiredContractEmailInfo($templateInfo);

    $status_array=(is_array($templateInfo['status']))? $templateInfo['status']:[$templateInfo['status']];
    foreach($status_array as $status){
        $data['status']=$status;
        $this->renderEmailDataAndSend('contract', $data,'client');
        $this->renderEmailDataAndSend('contract', $data,'admin');
    }
}



    public function sendSignUp($templateInfo){
        $emailData=new EmailData();
        $data=$emailData->signUpEmailInfo($templateInfo);

        $status_array=(is_array($templateInfo['status']))? $templateInfo['status']:[$templateInfo['status']];
        foreach($status_array as $status){
            $data['status']=$status;
            $this->renderEmailDataAndSend('signUp', $data,'client');
            $this->renderEmailDataAndSend('signUp', $data,'admin');
        }
    }
    public function sendForgetPassword($templateInfo){

        $emailData=new EmailData();
        $data=$emailData->forgetPasswordEmailInfo($templateInfo);

        $status_array=(is_array($templateInfo['status']))? $templateInfo['status']:[$templateInfo['status']];

        foreach($status_array as $status){
            $data['status']=$status;
            $this->renderEmailDataAndSend('forgetPassword', $data,'client');
            $this->renderEmailDataAndSend('forgetPassword', $data,'admin');
        }
    }



    public function sendBankAccount($templateInfo){

        $emailData=new EmailData();
        $data=$emailData->bankAccountEmailInfo($templateInfo);

        $status_array=(is_array($templateInfo['status']))? $templateInfo['status']:[$templateInfo['status']];
        foreach($status_array as $status){
            $data['status']=$status;
            $this->renderEmailDataAndSend('bankAccount', $data,'client');
            $this->renderEmailDataAndSend('bankAccount', $data,'admin');
        }
    }


}
