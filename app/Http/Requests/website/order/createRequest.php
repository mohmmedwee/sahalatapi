<?php
namespace App\Http\Requests\website\order;

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
            'restaurant_id'=>'required',
    "area_id"=>'required',
    "from_id"=>'required',
    "address_id"=>'required',
    "order_time"=>'required',
    "deliver_time"=>'required',
    "deliver_date"=>'required',
    "note"=>'required',
    "deliver_charge"=>'required',
    "rate"=>'required',
    "point"=>'required',
    "status"=>'required',
    "notification"=>'required',



        ];
    }
}
