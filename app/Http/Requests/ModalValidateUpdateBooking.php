<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ModalValidateUpdateBooking extends Request
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
            'pickup_position' => 'string|required',
            'destination' => 'string|required',
            'service_date' => 'required|date',
            'service_time' => 'required',
            'vehicle_no' => 'required|not_in:Select a vehicle',
            'driver_id' => 'required|not_in:Select a driver',
        ];
    }
}
