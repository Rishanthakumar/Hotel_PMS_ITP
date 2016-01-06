<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Input;

class CreateReservationRequest extends Request
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
            'customer_name' => 'sometimes|required|string',//use exists:customer,cus_id
            'country' => 'sometimes|required|not_in:Select a Country',
            'payment' => 'sometimes|required|not_in:Select Payment Type',
            'currency' => 'sometimes|required|not_in:Select Currency',
            'arrival' => 'sometimes|required|date|after:yesterday',
            'nights' => 'sometimes|required|numeric|digits_between:1,2|integer|min:1',
            'no_of_rooms' => 'sometimes|required|integer',
            'adults' => 'sometimes|required|integer|digits_between:1,2|integer|min:1',
            'children' =>'sometimes|integer|digits_between:1,2|integer|min:0',
            'departure' => 'sometimes|required|date|after:arrival',
            'individual' => 'sometimes|required_without_all:travel_agent,company',
            'company' => 'sometimes|required_without_all:travel_agent,individual',
            'travel_agent' => 'sometimes|required_without_all:company,individual',
            'customer_type' => 'required'



        ];


    }


}
