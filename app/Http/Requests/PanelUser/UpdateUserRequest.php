<?php

namespace App\Http\Requests\PanelUser;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;


/**
 * @property mixed id
 */
class UpdateUserRequest extends FormRequest
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
			'id'              => 'required|exists:users,id',
			'name'            => 'required|max:100',
			'mobile'          => 'required|max:11|unique:users,mobile,' . $this->id,
			'email'           => 'nullable|unique:users,email,' . $this->id,
			'active'          => 'nullable|in:Y,N',
			'expired_at'      => 'required|date',
			'password'        => ['nullable', 'min:8', 'regex:/[\dA-Z]+/', 'max:100'],
			'passwordConfirm' => 'required_with:password|same:password',
			'avatar'          => 'nullable|image',
		];
	}
}
