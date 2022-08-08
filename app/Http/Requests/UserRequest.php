<?php

namespace App\Http\Requests;

use App\Rules\StrongPassword;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [
            'first_name'       => ['required','string'],
            'last_name'        => ['required','string'],
            'company_name'     => ['required','string','unique:users,company_name'],
            'email'            => ['required','email','unique:users,email'],
            'phone_number'     => ['required','unique:users,phone_no'],
            'password'         => ['required',new StrongPassword],
            'role_name'        => ['required','integer'],
            'account_manager'  => ['required','integer'],
            'profile_editable' => ['required','integer'],
            'profile_image'    => ['nullable','image','mimes:png,jpg','max:1024']
        ];

        return $rules;
    }
}
