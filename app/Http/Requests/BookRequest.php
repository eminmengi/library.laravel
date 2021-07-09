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
            'name' => 'required',
            'author' => 'required',
            'isbn' => 'required|Numeric',
            'file' => 'mimes:jpg,jpeg,png|max:5120',

        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Kitap Adı Giriniz',
            'author.required' => 'Yazar Adı Giriniz',
            'isbn.required' => 'İsbn Nuramarısı Giriniz',
            'isbn.numeric' => 'İsbn yanlızca Sayı olabilir',
            'file.required' => 'Kapak Seçmediniz',
            'file.mimes' => 'Seçilen resim .jpg, .jpeg ve .gif formatında olmalıdır.',
            'file.max'=>'Maksimum boyut 5 Mb olmalıdır.'

        ];
    }
}
