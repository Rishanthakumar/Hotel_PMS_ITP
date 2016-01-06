<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class profilevalidate extends Request
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
            'first_name'=>'required|alpha',
            'last_name'=>'required|alpha',
            'telephone_number'=>'required|numeric|digits:10',
            'nic_passport'=>'required|regex:/^[0-9]{9}[XV]$/',
            'passport_id'=>'required|regex:/^[N][0-9]{9}$/',
            'address'=>'required|string',
            'lane1'=>'required|string',
            'lane2'=>'required|string',
            'bday'=>'required',
            'country'=>'required',
            'city'=>'required|string',
            'email'=>'required|email',

   //
        ];
    }
}
