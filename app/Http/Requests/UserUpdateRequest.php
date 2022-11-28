<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserUpdateRequest extends FormRequest
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
        $id = $this->request->get('id');
        return [
            'id' => ['required'],
            'name' => ['required'],
            'email' => ['required', Rule::unique('users', 'email')->ignore($id)],
            'birthdate' => ['required', 'date'],
            'user_type' => ['required', 'numeric'],
            'number_category' => ['required'],
        ];
    }
}
