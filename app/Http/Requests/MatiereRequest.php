<?php

namespace App\Http\Requests;

use App\Enum\UserRole;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class MatiereRequest extends FormRequest
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
            'nom_matiere' => 'required|string|unique:matieres'
        ];
    }
}
