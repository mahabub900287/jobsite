<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfferRequest extends FormRequest
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
            'offer_name'     => ['required','string'],
            'phone_number'   => ['required','max:20'],
            'country'        => ['required','string'],
            'offer_type'     => ['required','string'],
            'offer_price'    => ['required'],
            'call_type'      => ['required'],
            'category'       => ['required','string'],
            'traffic_source' => ['required','string'],
            'promotion_type' => ['required','string'],
            'call_limit'     => ['required',],
            'status'         => ['required','integer']
        ];

        if (request()->update_id) {

        }

        return $rules;
    }
}
