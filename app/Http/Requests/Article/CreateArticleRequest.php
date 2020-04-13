<?php

namespace App\Http\Requests\Article;

use Illuminate\Foundation\Http\FormRequest;


class CreateArticleRequest extends FormRequest
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
			'user_id'     => 'required|exists:users,id',
			'title'       => 'required|string',
			'article'     => 'required',
			'banner'      => 'required|image',
			'publish'     => 'required',
		];

	}
}
