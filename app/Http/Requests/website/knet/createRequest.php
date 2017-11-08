<?php
namespace App\Http\Requests\website\knet;

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
    "payment_id"=>'required',
    "users_id"=>'required',
    "order_id"=>'required',
    "PaymentID"=>'required',
    "Result"=>'required',
    "PostDate"=>'required',
    "TranID"=>'required',
    "Auth"=>'required',
    "Ref"=>'required',
    "TrackID"=>'required',
    "UDF1"=>'required',
    "UDF2"=>'required',
    "UDF3"=>'required',
    "UDF4"=>'required',
    "UDF5"=>'required',



        ];
    }
}
