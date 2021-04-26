<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MovieRequest extends FormRequest
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
            'author_id'     => 'required',
            'title'         => 'required|min:2',
            'price'         => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'title.required'    => 'Bitte eine Titel angeben!',
            'title.min'         => 'Der Titel muß mindestens :min Zeichen enthalten!',
            'price.required'    => 'Bitte einen Preis angeben!',
            'price.numeric'     => 'Der Preis darf nur numerische Zeichen enthalten!',
            'author_id.required'   => 'Bitte einen Autor auswählen!',
        ];
    }
}
