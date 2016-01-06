<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserProfileRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

            'FirstName' => 'required|alpha',
            'LastName' => 'required|alpha',
            'PhoneNo' => 'required|string|size:10|integer',
            //'Role' => 'required',
            'Email' => 'required|email',
            'Address' => 'required|alpha_num',
            'UserName' => 'required|min:3|max:32',
            //  'Password' => 'required|min:6|confirmed',
            'Password' => 'required|min:6',

            'Confirm Password' => 'same:password',





        ];
    }
}
