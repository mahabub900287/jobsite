<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogPostRequest extends FormRequest
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
            'title'             => ['required','unique:blog_posts,title'],
            'description'      => ['max:160'],
            'content'          => ['required'],
            'categories'       => ['required'],
            'meta_title'       => ['nullable','max:60'],
            'meta_description' => ['nullable','max:160'],
            'image'            => ['required','image','mimes:png,jpg,svg','max:1024']
        ];

        if (request()->post_update_id) {
            $rules['title'][1]         = 'unique:blog_posts,title,'.request()->post_update_id;
            $rules['image'][0]         = 'nullable';
        }

        return $rules;
    }
}
