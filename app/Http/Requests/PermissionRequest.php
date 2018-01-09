<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PermissionRequest extends Request
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
            'name' => 'required|max:100|unique:permissions,id'.$this->get('id'),
            'display_name' => 'required|max:100',
            'description' => 'required|min:10|max:255',
            'modulo_id' => 'required|numeric'
        ];
    }

}
