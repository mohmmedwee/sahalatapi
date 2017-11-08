<?php
namespace App\Http\Requests\admin\dish;

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
    "restaurant_id"=>'required',
    "cuisine_id"=>'required',
    "menu_section_id"=>'required',
    "category_id"=>'required',
    "delivery_menu_id"=>'required',
    "price"=>'required',
    "quantity"=>'required',
    "img"=>'required',
    "available_from"=>'required',
    "available_to"=>'required',
    "description_en"=>'required',
    "description_ar"=>'required',
    "status"=>'required',



];
}
}
