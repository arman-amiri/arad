<?php

namespace App\Http\Requests\Video;

use Illuminate\Foundation\Http\FormRequest;


class UploadVideoRequest extends FormRequest
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
			'course_id' => 'required|exists:courses,id',
			'user_id' => 'required|exists:users,id',
			'video' => 'nullable|mimes:mp4|max:100000',
			'title' => 'required|string',
			'info' => 'required|string',
			'publish' => 'required',
			'banner' => 'required',

		];
	}
}
