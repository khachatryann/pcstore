<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'name' => 'required',
            'image' => 'file|mimes:jpg,jpeg,png',
            'price' => 'required|integer',
            'qt' => 'required',
            'content' => 'required'
        ];
    }

    public function messages()
    {
        return [
            "name.required" => "This field is required",
            "image.file" => "Please choose file",
            "image.mimes" => "File must be jpg,jpeg or png",
            "price.required" => "This field is required",
            "price.integer" => "This field must be written only with number characters",
            "qt.required" => "This field is required",
            "content.required" => "This field is required"
        ];
    }
}
