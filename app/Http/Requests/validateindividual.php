<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class validateindividual extends Request
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

            'title_ti'=>'required',
            'fname'=>'required|alpha',
            'lname'=>'required|alpha',
            'tno'=>'required|numeric|digits:10',
            'NIC'=>'required|regex:/^[0-9]{9}[XV]$/',
            'passport'=>'required|regex:/^[N][0-9]{9}$/',
            'address'=>'required|string',
            'lane1'=>'required|string',
            'lane2'=>'required|string',
            'city'=>'required|string',
            'country'=>'required',
            'email'=>'required|email',
            //
        ];
    }
}
