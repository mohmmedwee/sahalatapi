<?php
namespace App\Http\Requests\admin\category;

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
    "name_en"=>'required',
    "name_ar"=>'required',
    "min_quantity"=>'required',
    "max_quantity"=>'required',
    "restaurant_id"=>'required',



];
}
}
