<?php

namespace App\Http\Requests\Dashboard\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users'],
            'avatar' => ['image', 'max:1000'],
            'status' => ['required'],
            'role_id' => ['required', 'exists:user_roles,id'],
            'password' => ['required', 'min:6']
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => __('The :attribute field is required', ['attribute' => __('name')]),
            'name.max' => __('The :attribute may not be greater than :max characters', ['attribute' => __('name'), 'max' => 255]),

            'email.required' => __('The :attribute field is required', ['attribute' => __('email')]),
            'email.email' => __('The :attribute must be a valid email address', ['attribute' => __('email')]),
            'email.max' => __('The :attribute may not be greater than :max characters', ['attribute' => __('email'), 'max' => 255]),
            'email.unique' => __('The :attribute has already been taken', ['attribute' => __('email')]),

            'status.required' => __('The :attribute field is required', ['attribute' => __('status')]),
            'avatar.required' => __('The :attribute field is required', ['attribute' => __('avatar')]),

            'role_id.required' => __('The :attribute field is required', ['attribute' => __('role')]),
            'role_id.exists' => __('The selected :attribute is invalid', ['attribute' => __('role')]),

            'password.required' => __('The :attribute field is required', ['attribute' => __('password')]),
            'password.min' => __('The :attribute must be at least :min characters', ['attribute' => __('password'), 'min' => 6]),
        ];
    }
}
