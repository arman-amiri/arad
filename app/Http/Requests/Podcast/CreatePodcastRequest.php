<?php

namespace App\Http\Requests\Podcast;

use Illuminate\Foundation\Http\FormRequest;


class CreatePodcastRequest extends FormRequest
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
			'category_id' => 'required|exists:categories,id',
			'user_id' => 'required|exists:users,id',
			'title'       => 'required|string',
			'info'        => 'required|string',
			'banner'      => 'required|image',
			'podcast'      => 'required',
			'publish'     => 'required',
		];
	}
}
