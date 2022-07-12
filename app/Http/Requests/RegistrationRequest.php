<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'username'=> ['required', 'unique:users,username', 'min:3', 'max:25', 'alpha_num'],
            'name'=> ['required', 'min:3', 'string'],
            'email'=> ['required', 'unique:users', 'email'],
            'password'=> ['required', 'min:8'],
        ];
    }
}
