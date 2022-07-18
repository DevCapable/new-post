<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class registrationRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|string|max:50',
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6'

        ];
    }

//    public function messages()
//    {
//        return [
//            'name.required' => 'Title Field is required!',
//            'email.required' => 'Content Field is required!',
////            'password' => '',
////            'password_confirmation' => 'min:6'
//        ];
//    }
}
