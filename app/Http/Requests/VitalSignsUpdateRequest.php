<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class VitalSignsUpdateRequest extends FormRequest
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
            'blood_pressure' => ['nullable'],
            'heart_pressure' => ['nullable'],
            'respiratory_frequency' => ['nullable'],
            'axiliary_temperature' => ['nullable'],
            'sap' => ['nullable'],
            'capillary_blood_glucose' => ['nullable']
        ];
    }
}
