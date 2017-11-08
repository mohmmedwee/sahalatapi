<?php
namespace App\Http\Requests\website\address;

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
    "users_id"=>'required',
    "area_id"=>'required',
    "name"=>'required',
    "type"=>'required',
    "first_name"=>'required',
    "last_name"=>'required',
    "pacl_number"=>'required',
    "block"=>'required',
    "street"=>'required',
    "judda"=>'required',
    "avenue"=>'required',
    "building"=>'required',
    "floor"=>'required',
    "apartment_number"=>'required',
    "mobile"=>'required',
    "phone"=>'required',
    "long"=>'required',
    "lat"=>'required',



        ];
    }
}
