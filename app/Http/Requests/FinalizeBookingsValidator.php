<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class FinalizeBookingsValidator extends Request
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

            'res_id' => 'required',
            'v_res_id' =>'required',
            'vehicle_no' => 'required',
            'package_price' => 'required',
            'package' => 'required',
            'mem_id' => 'required',
            'total_price' => 'required',



        ];
    }
}
