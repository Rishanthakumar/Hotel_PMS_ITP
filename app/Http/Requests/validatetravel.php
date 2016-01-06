<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class validatetravel extends Request
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
            'lname' => 'sometimes|required',
            'address'=>'required|string',

            'contact_no'=>'required|numeric|digits:10',
            'email'=>'required|email',
            //
        ];
    }
}
