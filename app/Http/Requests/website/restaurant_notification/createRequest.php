<?php
namespace App\Http\Requests\website\restaurant_notification;

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
    "restaurant_id"=>'required',
    "order_status"=>'required',
    "status"=>'required',



        ];
    }
}
