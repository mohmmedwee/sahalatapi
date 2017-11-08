<?php
namespace App\Http\Requests\admin\payment;

use App\Http\Requests\Request;

class editRequest extends Request
{
/**
* Determine if the user is authorized to make this request.
*
* @return bool
*/
public function authorize()
{
return true;
}

/**
* Get the validation rules that apply to the request.
*
* @return array
*/
public function rules()
{
return [
    "order_id"=>'required',
    "users_id"=>'required',
    "amount"=>'required',
    "status"=>'required',
    "type"=>'required',
    "notification"=>'required',



];
}
}
