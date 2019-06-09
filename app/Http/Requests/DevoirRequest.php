<?php

namespace App\Http\Requests;

use App\Enum\UserRole;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class DevoirRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->role === UserRole::PROF;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'formation_id'     => 'required',
            'intitule'         => 'required',
            'evaluer'          => 'required',
            'date_limit_depot' => 'required',
            'enonce'           => 'required|file|mimes:pdf,docx,rar,doc,zip,txt,csv,xls,xlsx',
            'periode'          => 'required',
            'nom_matiere'      => 'required',
            'type_correction'  => 'required',
        ];
    }
}
