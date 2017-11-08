<?php namespace App\Http\Middleware\website;

use Closure, Redirect, App, Session;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

use Illuminate\Support\Facades\DB;

class authorization
{
    public function handle($oRequest, Closure $fNext)
    {

        if (isset($oRequest->token)) {
            $this->loginByToken($oRequest->token);
            if ($oRequest->has('locale')) {
                $this->setLocale($oRequest->locale);
            }
        }
//        if (!canAccess(\Request::route()->getName())) {
//
//            return Redirect::route('client.auth.login')->withErrors([trans('general.invalidRole')]);
//        }

        $locale = ($oRequest->has('locale')) ? $oRequest->locale : false;
        $back = $this->setLocale($locale);


        if ($back == 'back') {
            return Redirect::back();
        }

        return $fNext($oRequest);


    }

    public function loginByToken($token)
    {
        $oCodeUserId = DB::table('activations')->where('code', '=', $token)->first();

        $oUser = Sentinel::findById($oCodeUserId->user_id);
        if ($oUser) {
            Sentinel::login($oUser);


            $permissions = '';
            $deny_permissions = '';
            foreach ($oUser->roles as $role) {
                $permissions .= $role['attributes']['permissions'];
                $deny_permissions .= $role['attributes']['deny_permissions'];
            }
            \Session::set('permissions', $permissions);
            \Session::set('deny_permissions', $deny_permissions);
        }
    }

    private function setLocale($locale)
    {
        if ($locale) {
            Session::put('locale', $locale);
            App::setLocale(Session::get('locale'));
            return 'back';
        } else {
            if (!Session::has('locale')) {
                Session::put('locale', 'en');
            }
        }

        App::setLocale(Session::get('locale'));

    }
}
