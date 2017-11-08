<?php
namespace App\Http\Requests\website\users;

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
    "first_name"=>'required',
    "last_name"=>'required',
    "email"=>'required|email|unique:users',
            "password"=>'required|confirmed',
            'password_confirmation'=> 'required',
            "mobile_company"=>'required',
    "mobile"=>'required|min:4|numeric',
            "phone"=>'required|min:4|numeric',
            "area_id"=>'required',


            "name"=>'required',
            "block"=>'required',
            "street"=>'required',
            "avenue"=>'required',
            "building"=>'required',
            "floor"=>'required',
            "apartment_number"=>'required',

            "address_mobile"=>'required|min:4|numeric',
            "address_phone"=>'required|min:4|numeric',

    "gender"=>'required',
            "occupation"=>'required',
            "terms"=>'required',





        ];
    }
}
