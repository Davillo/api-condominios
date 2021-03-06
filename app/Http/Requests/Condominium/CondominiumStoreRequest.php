<?php

namespace App\Http\Requests\Condominium;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CondominiumStoreRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100|unique:condominiums,email,NULL,id,deleted_at,NULL',
            'blocks' => 'array|required|min:1',
            'blocks.*' => 'integer|exists:blocks,id,deleted_at,NULL'
        ];
    }
}
