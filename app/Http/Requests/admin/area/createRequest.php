<?php
namespace App\Http\Requests\admin\area;

use App\Http\Requests\Request;

class createRequest extends Request
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
    "governorate_id"=>'required',
    "description_en"=>'required',
    "description_ar"=>'required',



        ];
    }
}
