<?php
namespace App\Http\Requests\common\users;

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
    "email"=>'required',
    "password"=>'required|confirmed',
    "password_confirmation"=>'required',
    "first_name"=>'required',
    "last_name"=>'required',



        ];
    }
}
