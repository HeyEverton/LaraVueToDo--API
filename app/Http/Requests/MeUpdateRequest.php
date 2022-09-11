<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MeUpdateRequest extends FormRequest
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
            'first_name' => 'required|string',
            'last_name' => 'string|nullable',
            'email' => 'required|email',
            'password' => 'sometimes|string|min:8|max:30|regex:(^[a-zA-Z0-9 _-]+[a-zA-Z0-9-14\-[a-zA-Z0-9-.]+$)',
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'Este campo é obrigatório',
            'email.required' => 'Este campo é obrigatório.',
            'email.email' => 'Este email inválido.',
            'password.min' => 'A senha precisa de no minimo 8 caracteres.',
            'password.max' => 'A senha excedeu o numero maximo de caracteres.',
        ];
    }

}
