<?php
namespace App\Http\Requests\admin\restaurant_rate;

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
    "rate"=>'required',
    "status"=>'required',
    "notification"=>'required',



        ];
    }
}
