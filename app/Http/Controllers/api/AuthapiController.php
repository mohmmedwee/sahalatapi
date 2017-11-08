<?php namespace App\Http\Controllers\api;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use App\Models\Users as mUsers;
use Illuminate\Database\Eloquent\Model;


 use Auth ;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;


use Illuminate\Support\Facades\DB;

use JWTAuth;

use Tymon\JWTAuth\Exceptions\JWTException;

/**
* 
*/
class AuthapiController extends Controller
{





	public function Apilogin(Request $request)
	{
		

		$credentioal=$request->only('email','password');
            
               
		//check if credentioal is correct
		try {
	
		$token = JWTAuth::attempt($credentioal);
		//update token on the database
		$user = Auth::User();
		$mUsers=mUsers::find($user->id);
   		$mUsers->update(['token'=>$token]);
	
	if(!$token){

		return response()->json(['error'=>'error in email or password'],401);
		}


	} catch (JWTException $e) {

	return response()->json(['error'=>'somthing _wrong'],500);
	
	}

		//generate a token and return it
return response()->json(['token'=>$token,'status'=>'Login Sucess'],200);


	}// end Apilogin









public function Apiregister(Request $request)
    {

    
		$email=$request->email;

		$user = mUsers::where('email',$email )->first();

	if($user!=null){return response()->json(['status'=>'User Exist '],200);}


	$hasedpassword=password_hash($request->password,PASSWORD_DEFAULT);
	$date=date("Y/m/d h:i:s");

$user=mUsers::create([
	'gender'=>$request->gender,
	'phone'=>$request->phone,
	'mobile_company'=>$request->mobile_company,
	'username'=>$request->username,
	'first_name'=>$request->name,
	'email'=>$request->email,
	'password'=>$hasedpassword,
	'created_at'=>$date,
	'updated_at'=>date("Y/m/d h:i:s"),
	'first_name'=>$request->first_name,
	'last_name'=>$request->last_name,
	'mobile'=>$request->mobile,


]);



$token=JWTAuth::fromUser($user);

$mUsers=mUsers::find($user->id);

$mUsers->update(['token'=>$token]);


 $oCodeUserId=\DB::table('activations')->insert([
	'user_id'=>$user->id,
	'code'=>$token,
	'completed'=>1,
	'completed_at'=> date("Y/m/d h:i:s"),
	'created_at'=>date("Y/m/d h:i:s"),
	'updated_at'=>date("Y/m/d h:i:s"),
]);

return response()->json(['token'=>$token,'user_id'=>$user->id,'status'=>'Sucess'],200);



}//end regester fnction









}





?>