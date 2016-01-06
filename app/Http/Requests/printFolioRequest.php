<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class printFolioRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;    //will respond with 403 FORBIDDEN HTTP request if true
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'start_date' => 'date_format:Y-m-d',
            'end_date' => 'date_format:Y-m-d|after:start_date'
        ];
    }

    public function messages(){

        return [
            'start_date.date_format' => 'The Start Date is not in the Year-Month-Date format.',
            'end_date.date_format' => 'The Start Date is not in the Year-Month-Date format.',
            'end_date.after' => 'End Date should be a date after Start Date.'
        ];
    }
}
