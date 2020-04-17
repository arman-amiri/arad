<?php

namespace App\Http\Requests\PanelUser;

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
     * @return array
     */
    public function rules()
    {
        return [

			'name'            => 'required|max:100',
			'mobile'        => 'required|max:11|unique:users',
			'email'        => 'nullable|unique:users',
			'active'          => 'nullable|in:Y,N',
			'expired_at'       => 'required|date',
			'password'        => ['required', 'min:8', 'regex:/[\dA-Z]+/', 'max:100'],
			'passwordConfirm' => 'required_with:password|same:password',
			'avatar' => 'required|image'
        ];
    }
}
