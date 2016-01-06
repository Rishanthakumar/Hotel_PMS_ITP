<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class Customer_Profile_valudate_preferences extends Request
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

            'member_id' => 'required|numeric',
            'general_information' => 'required|string',
            'allergy_information' => 'string',
            'special_information' => 'string'
        ];
    }
}
