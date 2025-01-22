<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;



class StoreUserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nome'  => 'required|min:3|max:50',
            'email' => 'required|email',
            'senha' => 'required|min:6|max:20|confirmed'
        ];
    }


    public function messages()
    {
        return [
            'email.required' => 'O campo E-mail é obrigatório',
            'email.email' => 'Deve-se informar um e-mail válido',
            'nome.required' => 'O campo Nome é obrigatório',
            'nome.min' => 'Nome muito curto. Para o campo nome o minímo é de 3 caracteres',
            'nome.max' => 'Nome muito Longo. Para o campo nome o máximo é de 50 caracteres',
            'senha.required' => 'O campo Senha é obrigatório',
            'senha.confirmed'=>' As senhas não correspondem. Digite novamente a senha e Confirmação de senha',
            'senha.min' => 'Senha muito curta. Para o campo nome o minímo é de 6 caracteres',
            'senha.max' => 'Senha muito longa. Para o campo nome o máximo é de 20 caracteres',
        ];
    }

    public function failedValidation(Validator $validator)
{
   throw new HttpResponseException(response()->json([
     'success'   => false,
     'message'   => 'Validation errors',
     'data'      => $validator->errors()
   ],400));
}
}
