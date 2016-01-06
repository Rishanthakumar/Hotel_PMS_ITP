<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class DriverLegalValidator extends Request
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
            'driver_id' => 'required|not_in:Select a driver',
            'driver_name' => 'required',
            'comment' => 'required',



        ];
    }
}
