<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CheckFirstConnexionFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::guest();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'password_old' => 'required|string',
            'password'     => 'required|string|min:6|confirmed'
        ];
    }

    public function messages()
    {
        return [
            'password_old.required' => 'L\'ancien mot de passe est obligatoire',
            'password.required'   => 'Le nouveau mot de passe est obligatoire',
            'password.confirmed'   => 'Vous devez saisir le même mot de pass pour confirmation',
        ];
    }
}
