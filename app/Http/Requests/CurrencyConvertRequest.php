<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CurrencyConvertRequest extends Request
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
            'amount' => 'required|numeric|min:1',
            /*'folio_num' => 'required|numeric|min:1'*/
        ];
    }

    public function messages(){

        return [
            'amount.required' => 'The In Amount is Required.',
            'amount.numeric' => 'The Amount should be a number.',
            'amount.min' => 'The amount should be more than zero.',
            /*'folio_num.required' => 'The Folio Number is required.',
            'folio_num.numeric' => 'The Folio Number should be a number.',
            'folio_num.min' => 'The Folio Number should start from 1 onwards.'*/
        ];

    }
}
