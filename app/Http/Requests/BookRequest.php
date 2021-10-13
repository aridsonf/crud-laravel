<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
            'title' => 'required',
            'pages' => 'required|numeric',
            'id_user' => 'required',
            'prices' => 'required|numeric',
        ];
    }

    public function messages()
{
    return [
        'title.required' => 'É preciso escrever um título!',
        'pages.required' => 'É preciso definir a quantidade de páginas!',
        'pages.numeric' => 'A quantidades de páginas precisa ser um número.',
        'prices.numeric' => 'O preço precisa ser um número.',
        'id_user.required' => 'É preciso escolher um autor!',
        'prices.required' => 'É preciso definir um preço!',
    ];
}
}
