<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class companyvalidate extends Request
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

            'comname'=>'required',
            'address'=>'required|string',
            'lane1'=>'required|string',
            'lane2'=>'required|string',
            'city'=>'required|string',
            'telephone_number'=>'required|numeric|digits:10',
            'email'=>'required|email'

        ];
    }
}
