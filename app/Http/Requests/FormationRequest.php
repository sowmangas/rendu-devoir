<?php

namespace App\Http\Requests;

use App\Enum\UserRole;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class FormationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->role === UserRole::ADMIN;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nom_formation' => 'required|string|unique:formations'
        ];
    }

    public function messages()
    {
        return [
            'nom_formation.required' => 'Le nom de la formation est obligatoire',
            'nom_formation.unique'   => 'Une autre formation existe déjà sous ce nom',
        ];
    }
}
