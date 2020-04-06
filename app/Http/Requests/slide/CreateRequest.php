<?php

namespace App\Http\Requests\slide;

use Illuminate\Foundation\Http\FormRequest;


class CreateRequest extends FormRequest
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
			'title'     => 'required|max:255',
			'link'      => 'required|max:1000',
			'published' => 'required|in:Y,N',
			// 'expiredAt' => 'required|date',
			'image'     => 'required|image|max:2024',
		];
	}
}
