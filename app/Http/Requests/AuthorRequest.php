<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthorRequest extends FormRequest
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
            'firstname' => 'required|between:3,20',
            'lastname'  => 'required|between:3,20',
        ];
    }

    public function messages()
    {
        return [
            'firstname.required'   => 'Ein Vorname muß angegeben werden!',
            'firstname.between'    => 'Der Vorname muß mindestens :min und darf maximal :max Zeichen enthalten!',
            'lastname.required'    => 'Ein Nachname muß angegeben werden!',
            'lastname.between'     => 'Der Nachname muß mindestens :min und darf maximal :max Zeichen enthalten!',
        ];
    }
}
