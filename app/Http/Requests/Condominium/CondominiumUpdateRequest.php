<?php

namespace App\Http\Requests\Condominium;

use Illuminate\Foundation\Http\FormRequest;

class CondominiumUpdateRequest extends FormRequest
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
            'name' => 'string|max:100',
            'email' => 'email|unique:condominiums,deleted_at,NULL|max:80',
            'blocks' => 'array|min:1',
            'blocks.*' => 'integer|exists:blocks,id,deleted_at,NULL'
        ];
    }
}
