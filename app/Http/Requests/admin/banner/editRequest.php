<?php
namespace App\Http\Requests\admin\banner;

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
    $this->merge(['default'=>(isset($this->default)? 1:0)]);
return [
    "img"=>'required',
    "order"=>'required',
    "status"=>'required',



];
}
}
