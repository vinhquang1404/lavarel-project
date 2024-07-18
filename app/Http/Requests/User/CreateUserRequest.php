<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'phone' => 'required|unique:users,phone|numeric',
            'gender' => 'required',
            'image' => 'nullable|image|mimes:png,jpg,jpeg',
            'password' => 'required|min:8',
            'email' => 'required|email|unique:users,email',
        ];
    }
}
