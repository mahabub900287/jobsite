<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PageRequest extends FormRequest
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
        $rules = [
            'name'    => ['required', 'string', 'max:35', 'unique:pages,name'],
            'content' => ['required'],
            'status'  => ['required']
        ];

        if (isset(request()->update_id)) {
            $rules['name'][3]='unique:pages,name,'.request()->update_id;
        }

        return $rules;

    }
}
