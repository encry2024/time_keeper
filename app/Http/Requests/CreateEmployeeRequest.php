<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateEmployeeRequest extends FormRequest
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
            'name'              => 'required',
            'employee_id'       => 'required|unique:employees,employee_id',
            'sss_number'        => array('unique:employees,sss_number', 'regex:/^[0-9]{2}[-][0-9]{7}[-][0-9]{1}$/i'),
            'philhealth_number' => array('unique:employees,philhealth_number', 'regex:/^[0-9]{2}[-][0-9]{9}[-][0-9]{1}$/i'),
            'pagibig_number'    => array('unique:employees,pagibig_number', 'regex:/^[0-9]{4}[-][0-9]{4}[-][0-9]{4}$/i'),
            'tin_number'        => array('unique:employees,tin_number', 'regex:/^[0-9]{3}[-][0-9]{3}[-][0-9]{3}[-][0-9]{4}$/i'),
            'password'          => 'required|confirmed'
        ];
    }
}
