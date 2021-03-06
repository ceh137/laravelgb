<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsUpdateRequest extends FormRequest
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
            'title' => ['string','required', 'min:5', 'max:255'],
            'category_id'  => ['int', 'required'],
            'article' => ['required', 'min:100', 'max:1000000'],
            'status_id' => ['required', 'int']
        ];
    }
}
