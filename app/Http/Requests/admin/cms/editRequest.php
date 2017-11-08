<?php
namespace App\Http\Requests\admin\cms;

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
    "title_en"=>'required',
    "title_ar"=>'required',
    "alias"=>'required',
    "content_en"=>'required',
    "content_ar"=>'required',



];
}
}
