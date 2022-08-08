<?php

namespace App\Http\Requests;

use App\Rules\StrongPassword;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class SignupRequest extends FormRequest
{
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json([
                'status'    =>  false,
                'errors'    =>  $validator->errors()
            ], 200)
        );
    }

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
            'first_name'           => ['required','max:60'],
            'last_name'            => ['required','max:60'],
            'email'                => ['required','email','unique:users,email'],
            'phone_number'         => ['required','unique:users,phone_no','max:17'],
            'password'             => ['required',new StrongPassword,'confirmed'],
            'company_name'         => ['required','unique:users,company_name','max:190'],
            'company_website'      => ['nullable','unique:users,company_website','max:190'],
            'address'              => ['required','string','max:190'],
            'city'                 => ['required','string','max:190'],
            'state'                => ['required','string','max:190'],
            'country'              => ['required','string'],
            'zip_code'             => ['required','string','max:50'],
            'skype_id'             => ['nullable','string'],
            'linkedin_profile'     => ['nullable','string'],
            'facebook_profile'     => ['nullable','string'],
            'publisher_network'    => ['required','max:190'],
            'promoting'            => ['required','max:150'],
            'promote_network'      => ['required','max:150'],
            'marketing_experience' => ['required','max:150'],
            'traffic_source'       => ['required'],
            'find_us'              => ['required']
        ];

        if (request()->advertiser === 'advertiser-register') {
            $rules = [
                'first_name'           => ['required','max:60'],
                'last_name'            => ['required','max:60'],
                'email'                => ['required','email','unique:users,email'],
                'phone_number'         => ['required','unique:users,phone_no','max:17'],
                'password'             => ['required',new StrongPassword,'confirmed'],
                'company_name'         => ['required','unique:users,company_name','max:190'],
                'company_website'      => ['nullable','unique:users,company_website','max:190'],
                'address'              => ['required','string','max:190'],
                'city'                 => ['required','string','max:190'],
                'state'                => ['required','string','max:190'],
                'country'              => ['required','string'],
                'zip_code'             => ['required','string','max:50'],
                'skype_id'             => ['nullable','string'],
                'linkedin_profile'     => ['nullable','string'],
                'facebook_profile'     => ['nullable','string'],
                'find_us'              => ['required'],
                'vertical_call'        => ['required'],
                'describe_requirement' => ['required']
            ];
        }

        return $rules;
    }
}
