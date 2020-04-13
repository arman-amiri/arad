<?php

namespace App\Http\Requests\Article;

use Illuminate\Foundation\Http\FormRequest;

class updateArticleRequest extends FormRequest
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
			'id'        => 'required|exists:articles,id',
			'category_id' => 'required|exists:categories,id',
			'user_id' => 'required|exists:users,id',
			'title' => 'required|string',
			'article' => 'required|string',
			'banner' => 'required|image',
        ];
    }
}
