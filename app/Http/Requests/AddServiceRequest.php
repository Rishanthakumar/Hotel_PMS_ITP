<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AddServiceRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;   //change this later accordingly
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'folio_num' => 'required|numeric|min:1'
        ];
    }

    public function messages(){

        return [
            'folio_num.required' => 'Please provide a Folio Number in the Add Service Interface to add a new service.',
            'folio_num.numeric' => 'Folio Number entered is not valid. Please enter a valid Folio Number.',
            'folio_num.min' => 'The Folio Number should start from 1 onwards.'
        ];
    }
}
