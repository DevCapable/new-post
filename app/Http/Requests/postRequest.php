<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class postRequest extends FormRequest
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
        return [
            'user_id' => 'required',
            'title' => 'required',
            'content' => 'required|string|max:400',
        ];
    }

    public function messages()
    {
        return [
            'user_id.required' => 'User Id Field is required!',
            'title.required' => 'Title Field is required!',
            'content.required' => 'Content Field is required!',
        ];
    }
}
