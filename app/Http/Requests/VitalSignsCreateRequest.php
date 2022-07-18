<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class VitalSignsCreateRequest extends FormRequest
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
            'patient_id' => ['required', Rule::exists('patients', 'id')],
            'blood_pressure' => ['required'],
            'heart_pressure' => ['required'],
            'respiratory_frequency' => ['required'],
            'axiliary_temperature' => ['required'],
            'sap' => ['required'],
            'capillary_blood_glucose' => ['required']
        ];
    }
}
