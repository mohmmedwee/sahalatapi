<?php
namespace App\Http\Requests\website\restaurant;

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

    "Owner_first_name"=>'required',
    "Owner_last_name"=>'required',
    "email"=>'required|email',

    "telephone"=>'required|numeric',
    "address_en"=>'required',




        ];
    }
}
