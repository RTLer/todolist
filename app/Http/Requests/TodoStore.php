<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TodoStore extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'=>[
                'required',
                'min:8'
            ],
            'expired_at'=>[
                'required',
                'date'
            ]
        ];
    }
    public function messages()
    {
        return [
            'title.required'=>'is required',
            'title.min'=>'bayad 8 char bashad'
        ];
    }
}
