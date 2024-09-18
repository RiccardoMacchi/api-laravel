<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BeerRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|min:3|max:100',
            'price' => 'required|min:0',
            'average' => 'required|numeric|min:0|max:5',
            'image' => 'required|max:255'
        ];
    }

    public function message(){
        return [
            'name.required' => 'Il nome è un campo obbligatorio',
            'name.min' => 'Il nome deve avere almeno :min caratteri',
            'name.max' => 'Il nome deve avere massimo :max caratteri',
            'price.required' => 'Il prezzo è un campo obbligatorio',
            'price.max' => 'Il prezzzo deve avere massimo :max caratteri',
            'average.required' => 'Il Voto è un campo obbligatorio',
            'average.numeric' => 'Il Voto deve essere numerico',
            'average.min' => 'Il Voto deve essere di almeno :min caratteri',
            'average.max' => 'Il Voto deve essere di massimo :max caratteri',
            'image.required' => 'L\'immagine è un campo obbligatorio',
            'image.max' => 'L\'immagine deve avere :max caratteri'
        ];
    }
}

