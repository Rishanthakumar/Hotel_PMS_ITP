<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AddVehicleValidator extends Request
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

            'vehicle_no' => 'required',
            'vehicle_type' => 'required|not_in:Select a vehicle type',
            'brand' => 'required|not_in:Select a vehicle brand',
            'model' => 'required',
            'colour' => 'required|not_in:Select a colour',
            'cylinder_capacity' => 'required|regex:/^[0-9]{4}[cC][cC]$/',
            'reg_date' => 'required|date',
            'manu_year' => 'required|numeric|digits:4',
            'rate_per_km' => 'required',
            'status' => 'required|not_in:Select a status'

        ];
    }
}
