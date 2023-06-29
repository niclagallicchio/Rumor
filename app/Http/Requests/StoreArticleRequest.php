<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|max:150',
            'category' => 'required|max:50',
            'body' => 'required|max:5000',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Il campo Titolo non può essere vuoto',
            'title.max' => 'Il campo non può essere più lungo di :max caratteri',
            'category'=> 'Il campo Category non può essere vuoto',
            'category.max' => 'Il campo non può essere più lungo di :max caratteri',
            'body'=> 'Il campo Category non può essere vuoto',
            'body.max' => 'Il campo non può essere più lungo di :max caratteri',


        ];
    }
}
