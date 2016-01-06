<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class BatchPostRequest extends Request
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
            'folio_num' => 'required'
        ];
    }

    public function messages(){

        return [
            'folio_num.required' => 'Please provide a set of Folio Numbers separated by a single space to do a new Batch Post.'
        ];
    }
}
