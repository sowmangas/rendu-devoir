<?php

namespace App\Http\Requests;

use App\Enum\UserRole;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ModificationNoteFormRequest extends FormRequest
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
            'note'            => 'required',
            'commentaire'     => 'required',
            'old_note'        => 'required',
            'old_commentaire' => 'required',
            'justif'          => 'required',
            'user_id'         => 'required',
            'rendu_id'        => 'required',
        ];
    }
}
