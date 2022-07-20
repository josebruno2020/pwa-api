<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatientRequest extends FormRequest
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
            'birthdate'     => ['required', 'date'],
            'name_mother'   => ['required'],
            'cns'           => ['nullable'],
            'cpf'           => ['required'],
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
            'is_choosed'    => ['required']
        ];
    }
}
