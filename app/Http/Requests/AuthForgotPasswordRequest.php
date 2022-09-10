<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthForgotPasswordRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email' => 'required|email',
            'token' => 'string',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Este campo é obrigatório',
            'email.email' => 'Este campo requer um, e-mail válido',
            'token.string' => 'Token inválido',
        ];
    }
}
