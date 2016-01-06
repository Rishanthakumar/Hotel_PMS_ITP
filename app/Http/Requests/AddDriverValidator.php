<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AddDriverValidator extends Request
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
            'guest_name' => 'required',
            'res_id' => 'required',
            'tel_no' => 'required|digits:10',
            'vehicle_no' => 'required|not_in:Select a vehicle',
            'driver_name' => 'required|not_in:Select a driver',
            'package' => 'required|not_in:Select a package',
            'package_price' => 'required',
            'mem_id' =>'required'

        ];
    }
}
