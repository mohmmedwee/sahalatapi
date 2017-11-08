<?php
namespace App\Http\Requests\admin\restaurant_users;

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
    "restaurant_id"=>'required',
    "status"=>'required',
    "type"=>'required',



        ];
    }
}
