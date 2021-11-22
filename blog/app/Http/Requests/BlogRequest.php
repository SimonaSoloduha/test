<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
            'title' => 'required|min:5|max:20',
            'photo' => 'required|mimes:jpeg,jpg|dimensions:min_width=100'

        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Поле название является обязательным',
            'title.min' => 'Поле название должно содержать больше 5 символов',
        ];
    }
}
