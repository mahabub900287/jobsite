<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HeroContentRequest extends FormRequest
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
            'title'                => ['nullable','string','max:185'],
            'subtitle'             => ['nullable','string'],
            'button_one_text'      => ['nullable','string'],
            'button_one_url'       => ['nullable'],
            'button_two_text'      => ['nullable','string'],
            'button_two_url'       => ['nullable'],
            'image'                => ['nullable','image','mimes:png,jpg,jpeg,gif,svg'],
            'bg_color'             => ['nullable'],
        ];
    }

    /**
     * custom message
     */

}
