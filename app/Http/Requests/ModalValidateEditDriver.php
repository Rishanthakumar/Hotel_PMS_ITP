<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ModalValidateEditDriver extends Request
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

            'fname' => 'required|alpha',
            'lname' => 'required|alpha',
            'licence_no' => 'required|regex:/^[B][0-9]{7}$/',
            'NIC' => 'required|regex:/^[0-9]{9}[XV]$/',
            'address' => 'required',
            'tel_no' => 'required|numeric|digits:10',
            'status' => 'required|not_in:Select a status'


        ];
    }
}
