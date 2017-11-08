<?php
namespace App\Http\Requests\admin\payment_way;

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

    $this->merge(['setting'=>json_encode($this->setting)]);
return [
    "restaurant_id"=>'required|numeric',
    "payment_type"=>'required|numeric',
    "commission"=>'required|numeric',

    "type"=>'required|numeric',



];
}
}
