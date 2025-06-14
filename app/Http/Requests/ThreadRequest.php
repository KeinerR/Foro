<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ThreadRequest extends FormRequest
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
            'category_id'=>'required',
            'title'=>'required',
            'content'=>'required',
            'user_id'=>'nullable',

        ];
    }


    public function messages()
    {
        return[
            'category_id.required'=>'la categoria es necesaria para editar  la pregunta',
            'title.required'=>'el titulo de la pregunta es necesaria para editar  la pregunta',
            'content.required'=>'el contenido de la pregunta es necesaria para editar  la pregunta',

        ];
    }
}
