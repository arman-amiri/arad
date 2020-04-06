<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
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
    	//TODO: Illuminate\Http\Exceptions\PostTooLargeException
		//به حجم ارور بالا رو میده
        return [
			'id'        => 'required|exists:categories,id',
			'title'     => 'required|max:255',
			'banner'     => 'nullable|image',

		];
    }
}
