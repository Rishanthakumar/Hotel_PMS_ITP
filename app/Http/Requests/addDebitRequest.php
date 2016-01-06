<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class addDebitRequest extends Request
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
            'amount' => 'required|numeric|min:50|max:5000'
        ];
    }

    public function messages(){

        return [
            'amount.required' => 'Please Enter a Debit Amount.',
            'amount.numeric' => 'Please Enter a Numeric value.',
            'amount.min' => 'Minimum debit value is $50.00.',
            'amount.max' => 'Maximum debit value is $5000.00.'
        ];
    }
}
