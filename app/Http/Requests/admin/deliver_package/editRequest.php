<?php
namespace App\Http\Requests\admin\deliver_package;

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
    "deliver_number"=>'required',
    "price"=>'required',



];
}
}
