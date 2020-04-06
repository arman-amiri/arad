<?php

namespace App\Http\Requests\Podcast;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePodcastRequest extends FormRequest
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
			'id'        => 'required|exists:podcasts,id',
			'category_id' => 'required|exists:categories,id',
			'title'       => 'required|string',
			'info'        => 'required|string',
			'banner'     => 'nullable|image',
			'podcast'      => 'nullable',
			'publish'     => 'required',
        ];
    }
}
