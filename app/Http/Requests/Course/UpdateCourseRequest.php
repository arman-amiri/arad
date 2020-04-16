<?php

namespace App\Http\Requests\Course;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCourseRequest extends FormRequest
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
			'id'        => 'required|exists:courses,id',
			'category_id' => 'required|exists:categories,id',
			'title' => 'required|string',
			'price' => 'nullable|string',
			'teacher_name' => 'required|string',
			'info' => 'required|string',
			'banner'     => 'nullable|image',
        ];
    }
}
