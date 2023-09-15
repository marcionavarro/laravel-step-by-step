<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'alpha', 'min:6', 'max:10'],
            'email' => 'required|email',
            'password' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Seu nome é obrigatório',
            'name.alpha' => 'O campo do nome deve conter apenas letras.',
            'name.min' => 'O campo do nome deve ter pelo menos 6 caracteres.',
            'email.required' => 'O campo e-mail é obrigatório.',
            'email.email' => 'O campo de e-mail deve ser um endereço de e-mail válido.',
            'password.required' => 'O campo de senha é necessária..',
        ];
    }
}
