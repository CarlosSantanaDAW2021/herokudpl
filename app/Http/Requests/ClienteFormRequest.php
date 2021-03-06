<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;


class ClienteFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */

    protected $stopOnFirstFailure = true;

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
            "name" => "required|string|max:255",
            "email" => "required|email|max:255",
            "telefono" => "required|digits:9"
            
        ];
    }

    public function messages()
    {
        return [
            "name.required"=>"Es requerido un nombre",
            "email.required"=>"Es requerido un email",
            "telefono.required"=>"Es requerido un telefono"
        ];
    }

    public function attributes(){
        return[
            'name'=>'nombre de usuario',
            'email'=>'email del usuario',
            'telefono'=>'telefono del usuario'
        ];
    }
}
