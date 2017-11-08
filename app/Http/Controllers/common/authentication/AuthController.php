<?php

namespace App\Http\Controllers\common\authentication;

use App\Http\Controllers\Controller;

use App\Models\User;
use App\Models\Contacts;
use Illuminate\Http\Request;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Cartalyst\Sentinel\Laravel\Facades\Activation;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Cartalyst\Sentinel\Laravel\Facades\Reminder;
use App\Http\Controllers\common\email\EmailController as Email;

use Cartalyst\Sentinel\Addons\Social\Laravel\Facades\Social;
use Cartalyst\Sentinel\Addons\Social\Models\LinkInterface;

class AuthController extends Controller
{


    public function __construct()
    {

    }

    public function getLogin()
    {

        return view('common.authentication.login')
            ->with('random', rand(1, 3));
    }

    public function postLogin(Request $oRequest)
    {


        try {
            if(isset($oRequest->token)){

                $oCodeUserId=DB::table('activations')->where('code','=',$oRequest->token)->first();

                $oUser = Sentinel::findById($oCodeUserId->user_id);

                Sentinel::login($oUser);

            }else{

                $oUser = Sentinel::authenticate([
                    'email' => $oRequest->email,
                    'password' => $oRequest->password,
                ]);
            }

            $permissions='';
            $deny_permissions='';
            if(isset($oUser->roles ) && count($oUser->roles )){
            foreach($oUser->roles as $role){
                $permissions.=$role['attributes']['permissions'];
                $deny_permissions.=$role['attributes']['deny_permissions'];
            }
            }
            \Session::set('permissions',$permissions);
            \Session::set('deny_permissions',$deny_permissions);
        } catch (ThrottlingException $e) {

        } catch (NotActivatedException $e) {

        } catch (Exception $e) {
            return Redirect::route('common.authentication.login')->withErrors([trans('user.InvalidLogin')]);
        }

   if($oRequest->ajax() && !isset($oUser->id)){

            return new JsonResponse(['status' => 'error','messages'=>'Login Failed. Either your Email/password is incorrect.'], 422);

        }


        if($oRequest->ajax()){
            $oCode=DB::table('activations')->where('user_id','=',$oUser->id)->first();

            echo json_encode(['status'=>'success','token'=>$oCode->code,'redirect'=>route('users.index')]);//exit();
        }else {
            return Redirect::intended($this->userAfterLoginPage());
        }


    }
    public function userAfterLoginPage(){
        if(\Sentinel::inRole('driver') || \Sentinel::inRole('dispatcher')){

            return route('admin.order_driver.index');
        }elseif(\Sentinel::inRole('service-company-manager') ){

            return route('admin.service_company.index');
        }elseif(\Sentinel::inRole('service-boy')){

            return route('admin.service_company_order.index');
        }else{



            return route('dashboard.index');
        }

    }

    public function getLogout(){
        Sentinel::logout(null, true);
     //   return redirect()->route('client.auth.login');
        return Redirect::to('/');
    }

















    public function getRecover()
    {
        return view('website.users.forgetPassword')
            ->with('random', rand(1, 3));
    }

    public function postRecover(Request $oRequest)
    {
        $message = trans('user.PleaseTryAgain');
        $credentials = [
            'email' => $oRequest->email,
        ];

        $user = Sentinel::findByCredentials($credentials);


        if ($user) {
            $oReminder = Reminder::create($user);

            if ($oReminder) {


                // TODO email template new way
//                $oEmail = new Email();
//                $oEmail->forgetPassword();
                $email=new  Email();
                $email->sendForgetPassword(['id'=> $oReminder->id,'status'=>[0]]);



                $message = trans('user.checkEmailResetPassword');
            }

        } else {
            $message = trans('user.userNotExist');
        }


        return view('website.users.forgetPassword')
            ->with('random', rand(1, 3))
            ->withErrors($message);
    }

    function getResetForgetPassword($userId, $code)
    {

        return view('website.users.resetForgetPassword')
            ->with('random', rand(1, 3));
    }

    function postResetForgetPassword(Request $oRequest, $userId, $code)
    {
        $message = trans('user.PleaseTryAgain');
        $user = Sentinel::findById($userId);

        /* TODO validate password and confirm from Request not from code */

        if($oRequest->password ==$oRequest->confirmPassword && strlen($oRequest->password) > 7){
            if ($reminder = Reminder::complete($user, $code, $oRequest->password))
            {
                $oReminder=Reminder::where(['code'=>$code,'user_id'=>$userId])->first();
                // TODO email template new way
                $email=new  Email();
                $email->sendForgetPassword(['id'=> $oReminder->id,'status'=>[1]]);

                // Reminder was successfull
                return Redirect::route('client.auth.login');
            }
        }else{

            $message=trans('user.invalidPassord');
        }



        return view('website.users.resetForgetPassword')
            ->with('random', rand(1, 3))
            ->withErrors($message);
    }


    function getActivateAccount(Request $oRequest,$userId,$code){

        $message=trans('PleaseTryAgain');
        $user = Sentinel::findById($userId);

        if (Activation::complete($user,$code)) {
            // Reminder was successfull


            $assignMt4UsresByEmail=$this->oMt4User->getMt4UsersByEmail($user);

            return Redirect::route('client.auth.login');
        }



        return view('client.user.activateAccountResult')
            ->with('random', rand(1, 3))
            ->withErrors($message);
    }

    function postResendActivateEmail(Request $oRequest,$userId,$code){

        $oUser = Sentinel::findById($userId);
        $oActivation = Activation::create($oUser);



        $oEmail = new Email;
        @$oEmail->activeAccount(['email'=>$oUser->email,
            'code'=>$oActivation->code,
            'userId'=>$userId,
            'website'=>$oRequest->root()
        ]);

        return view('client.user.activateAccountResult')
            ->with('random', rand(1, 3));
    }


    public function getFacebookLogin()
    {

        Social::addConnection(Config('project.facebookLoginProvider'), [
                'driver' => Config('project.facebookLoginDriver'),
                'identifier' => Config('project.facebookLoginIdentifier'),
                'app_id' => Config('project.facebookLoginApp_id'),
                'secret' => Config('project.facebookLoginSecret'),
                'scopes' => ['email'],
            ]
        );
        $callback =Config('project.facebookLoginCallback');
        $url = Social::getAuthorizationUrl('facebook', $callback);
        header('Location: ' . $url);
        exit;
    }

    public function getFacebookLoginCallback(\Illuminate\Support\Facades\Request $oRequest)
    {
        $callback =Config('project.facebookLoginCallback');
        Social::addConnection(Config('project.facebookLoginProvider'), [
                'driver' => Config('project.facebookLoginDriver'),
                'identifier' => Config('project.facebookLoginIdentifier'),
                'app_id' => Config('project.facebookLoginApp_id'),
                'secret' => Config('project.facebookLoginSecret'),
                'scopes' => ['email'],
            ]
        );
        try {
            $user = Social::authenticate('facebook', $callback, function (LinkInterface $link, $provider, $token, $slug) {

                $user = $link->getUser();

                $data = $provider->getUserDetails($token);

                $user->save();

                Sentinel::login($user);
                if (!$user->inRole('client')) {
                    $activation = Activation::create($user);
                    $activation_code = $activation->code;
                    $role = Sentinel::findRoleByName('client');
                    $role->users()->attach($user);

//                    $aCredentialsFullDetails = [
//                        'users_id' => $user->id,
//                        'nickname' => (isset($data->nickname)) ? $data->nickname : '',
//                        'address' => (isset($data->location)) ? $data->location : '',
//                        'birthday' => (isset($data->birthday)) ? $data->birthday : ' ',
//                        'phone' => (isset($data->phone)) ? $data->phone : ' ',
//                        'country' => (isset($data->country)) ? $data->country : ' ',
//                        'city' => (isset($data->city)) ? $data->city : ' ',
//                        'zip_code' => (isset($data->zip_code)) ? $data->zip_code : ' ',
//                        'gender' => (isset($data->gender) && $data->gender == 'female') ? 1 : 0
//                    ];
//                    $details = new UsersDetails($aCredentialsFullDetails);
//                    $details->save();
                }
            });
        } catch (Cartalyst\Sentinel\Addons\Social\AccessMissingException $e) {

            return redirect()
                ->route('client.auth.login')
                ->withErrors([trans('user.InvalidLogin')]);
        }catch(Cartalyst\Sentinel\Addons\Social\InvalidArgumentException $e){

        }
        return Redirect::intended('/users');
    }

    public function getGoogleLogin()
    {

        Social::addConnection(Config('project.googleProvider'), [
                'driver' => Config('project.googleDriver'),
                'identifier' => Config('project.googleIdentifier'),
                'secret' => Config('project.googleSecret'),
                'scopes' => ['email'],
            ]
        );

        $callback =Config('project.googleCallback');
        $url = Social::getAuthorizationUrl('google', $callback);


        header('Location: ' . $url);
        exit;
    }

    public function getGoogleLoginCallback(\Illuminate\Support\Facades\Request $oRequest)
    {

        $callback = Config('project.googleCallback');
        Social::addConnection(Config('project.googleProvider'), [
                'driver' => Config('project.googleDriver'),
                'identifier' => Config('project.googleIdentifier'),
                'secret' => Config('project.googleSecret'),
                'scopes' => ['email'],
            ]
        );
        try {

            $user = Social::authenticate('google', $callback, function (LinkInterface $link, $provider, $token, $slug) {

                $user = $link->getUser();
                $data = $provider->getUserDetails($token);
                $user->save();

                if (!$user->inRole('client')) {
                    $activation = Activation::create($user);
                    $activation_code = $activation->code;
                    $role = Sentinel::findRoleByName('client');
                    $role->users()->attach($user);

//                    $aCredentialsFullDetails = [
//                        'users_id' => $user->id,
//                        'nickname' => (isset($data->nickname)) ? $data->nickname : '',
//                        'address' => (isset($data->location)) ? $data->location : '',
//                        'birthday' => (isset($data->birthday)) ? $data->birthday : ' ',
//                        'phone' => (isset($data->phone)) ? $data->phone : ' ',
//                        'country' => (isset($data->country)) ? $data->country : ' ',
//                        'city' => (isset($data->city)) ? $data->city : ' ',
//                        'zip_code' => (isset($data->zip_code)) ? $data->zip_code : ' ',
//                        'gender' => (isset($data->gender) && $data->gender == 'female') ? 1 : 0
//                    ];
//
//                    $details = new UsersDetails($aCredentialsFullDetails);
//                    $details->save();
                }
            });
        } catch (Cartalyst\Sentinel\Addons\Social\AccessMissingException $e) {
            return redirect()
                ->route('client.auth.login')
                ->withErrors([trans('user.InvalidLogin')]);
        }
        return Redirect::intended('/users');
    }

    public function getLinkedinLogin()
    {


        Social::addConnection(Config('project.linkedinProvider'), [
                'driver' => Config('project.linkedinDriver'),
                'identifier' =>Config('project.linkedinIdentifier'),
                'secret' => Config('project.linkedinSecret'),
            ]
        );

        $callback = Config('project.linkedinCallback');
        $url = Social::getAuthorizationUrl('linkedin', $callback);
        header('Location: ' . $url);
        exit;
    }

    public function getLinkedinLoginCallback(\Illuminate\Support\Facades\Request $oRequest)
    {

        $callback = Config('project.linkedinCallback');


        Social::addConnection(Config('project.linkedinProvider'), [
                'driver' => Config('project.linkedinDriver'),
                'identifier' =>Config('project.linkedinIdentifier'),
                'secret' => Config('project.linkedinSecret'),
            ]
        );
        try {

            $user = Social::authenticate('linkedin', $callback, function (LinkInterface $link, $provider, $token, $slug) {

                $user = $link->getUser();
                $data = $provider->getUserDetails($token);
                $user->save();

                if (!$user->inRole('client')) {
                    $activation = Activation::create($user);
                    $activation_code = $activation->code;
                    $role = Sentinel::findRoleByName('client');
                    $role->users()->attach($user);

//                    $aCredentialsFullDetails = [
//                        'users_id' => $user->id,
//                        'nickname' => (isset($data->nickname)) ? $data->nickname : '',
//                        'address' => (isset($data->location)) ? $data->location : '',
//                        'birthday' => (isset($data->birthday)) ? $data->birthday : ' ',
//                        'phone' => (isset($data->phone)) ? $data->phone : ' ',
//                        'country' => (isset($data->country)) ? $data->country : ' ',
//                        'city' => (isset($data->city)) ? $data->city : ' ',
//                        'zip_code' => (isset($data->zip_code)) ? $data->zip_code : ' ',
//                        'gender' => (isset($data->gender) && $data->gender == 'female') ? 1 : 0
//                    ];
//
//                    $details = new UsersDetails($aCredentialsFullDetails);
//                    $details->save();
                }
            });
        } catch (Cartalyst\Sentinel\Addons\Social\AccessMissingException $e) {
            return redirect()
                ->route('client.auth.login')
                ->withErrors([trans('user.InvalidLogin')]);
        }
        return Redirect::intended('/users');
    }

//    public function getTwitterLogin()
//    {
//
//
//        Social::addConnection('twitter', [
//                'driver' => 'twitter',
//                'identifier' => 'ls4If9Mewb28kKF8DtjgBw7Os',
//                'secret' => 'OhjvkSm7P4yHEJ89FpHsChCWhgTwO9Xp5QT9kvkZx5G6I4sw82',
//                'scopes' => [],
//            ]
//        );
//
//        $callback = 'http://localhost:8000/client/twitter-callback-login';
//        $url = Social::getAuthorizationUrl('twitter', $callback);
//        header('Location: ' . $url);
//        exit;
//    }
//
//    public function getTwitterLoginCallback(\Illuminate\Support\Facades\Request $oRequest)
//    {
//
//        $callback = 'http://localhost:8000/client/twitter-callback-login';
//
//
//        Social::addConnection('twitter', [
//                'driver' => 'twitter',
//                'identifier' => 'ls4If9Mewb28kKF8DtjgBw7Os',
//                'secret' => 'OhjvkSm7P4yHEJ89FpHsChCWhgTwO9Xp5QT9kvkZx5G6I4sw82',
//                'scopes' => [],
//            ]
//        );
//        try {
//
//            $user = Social::authenticate('twitter', $callback, function (LinkInterface $link, $provider, $token, $slug) {
//
//                $user = $link->getUser();
//                $data = $provider->getUserDetails($token);
//                $user->save();
//
//                if (!$user->inRole('client')) {
//                    $activation = Activation::create($user);
//                    $activation_code = $activation->code;
//                    $role = Sentinel::findRoleByName('client');
//                    $role->users()->attach($user);
//
//                    $aCredentialsFullDetails = [
//                        'users_id' => $user->id,
//                        'nickname' => (isset($data->nickname)) ? $data->nickname : '',
//                        'address' => (isset($data->location)) ? $data->location : '',
//                        'birthday' => (isset($data->birthday)) ? $data->birthday : ' ',
//                        'phone' => (isset($data->phone)) ? $data->phone : ' ',
//                        'country' => (isset($data->country)) ? $data->country : ' ',
//                        'city' => (isset($data->city)) ? $data->city : ' ',
//                        'zip_code' => (isset($data->zip_code)) ? $data->zip_code : ' ',
//                        'gender' => (isset($data->gender) && $data->gender == 'female') ? 1 : 0
//                    ];
//
//                    $details = new UsersDetails($aCredentialsFullDetails);
//                    $details->save();
//                }
//            });
//        } catch (Cartalyst\Sentinel\Addons\Social\AccessMissingException $e) {
//            return redirect()
//                ->route('client.auth.login')
//                ->withErrors([trans('user.InvalidLogin')]);
//        }
//        return Redirect::intended('/client');
//    }




}
