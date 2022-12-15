<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatientCreateRequest extends FormRequest
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
            'name'          => ['required'],
            'birthdate'     => ['nullable', 'date'],
            'name_mother'   => ['nullable'],
            'cns'           => ['nullable'],
            'cpf'           => ['nullable'],
            'rg'            => ['nullable'],
            'from_city'     => ['nullable'],
            'from_state'    => ['nullable'],
            'phone_number'  => ['nullable'],
            'mobile_number' => ['nullable'],
            'street'        => ['nullable'],
            'number'        => ['nullable'],
            'complement'    => ['nullable'],
            'neighborhood'  => ['nullable'],
            'city'          => ['nullable'],
            'state'         => ['nullable'],
        ];
    }
}
