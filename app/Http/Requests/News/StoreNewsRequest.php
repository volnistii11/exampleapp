<?php

namespace App\Http\Requests\News;

use Illuminate\Foundation\Http\FormRequest;

class StoreNewsRequest extends FormRequest
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
            'title' => ['required','string', 'max:100'],
            'description' => ['required','string', 'max:300'],
            'category_id' => ['required','integer', 'exists:categories,id'],
            'source_id' => ['required','integer', 'exists:sources,id'],
            'rating' => ['required', 'integer', 'min:1', 'max:5']
        ];
    }
}
