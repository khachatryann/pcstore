<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required|alpha',
            'avatar' => 'file|mimes:jpg,jpeg,png',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ];
    }

    public function messages()
    {
        return [
            "name.required" => "This field is required",
            "name.alpha" => "You must write only alphabetic characters",
            "avatar.file" => "Please choose file",
            "avatar.mimes" => "File must be jpg,jpeg or png",
            "email.required" => "This field is required․",
            "email.email" => "Invalid email",
            "email.unique" => "Profile exists․",
            "password.required" => "This field is required․",
            "password.min" => "The minimum number of characters for the password is 6",
        ];
    }
}
