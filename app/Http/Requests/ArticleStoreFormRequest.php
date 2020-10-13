<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleStoreFormRequest extends FormRequest
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
            'title' => 'required|min:5',
            'description' => 'required|min:5',
            'video' => 'required|file|mimetypes:video/avi,video/mpeg,video/mp4',
            'image' => 'required|image|mimes:jpeg,jpg,png,gif|required',
            'type' => 'required'
        ];
    }
}
