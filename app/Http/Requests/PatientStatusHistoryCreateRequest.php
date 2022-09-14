<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PatientStatusHistoryCreateRequest extends FormRequest
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
            'status_from' => ['required'],
            'destiny' => ['required'],
            'is_alta' => ['required'],
            'companion' => ['nullable'],
            'relationship' => ['nullable'],
            'obs' => ['nullable']
        ];
    }
}
