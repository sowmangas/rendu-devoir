<?php

namespace App\Http\Requests;

use App\Enum\UserRole;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class RenduFormRequestEtudiant extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->role === UserRole::ETUDIANT;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'rendu'     => 'required|file|mimes:pdf,docx,rar,doc,zip,txt,csv,xls,xlsx',
            'devoir_id' => 'required',
        ];
    }
}
