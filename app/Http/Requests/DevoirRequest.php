<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DevoirRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            //
            'code_formation'   => 'required:devoir',
            'identifiant'      => 'required:devoir',
            'intitule'         => 'required:devoir',
            'evaluer'          => 'required:devoir',
            'date_limit_depot' => 'required:devoir',
            'enonce'           => 'required:devoir',
            'nom_matiere'      => 'required:devoir'
        ];
    }
}
