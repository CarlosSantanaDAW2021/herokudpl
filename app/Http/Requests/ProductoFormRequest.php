<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductoFormRequest extends FormRequest
{
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
            "nombre" => "required|string|max:255",
            "precio" => "required|numeric|gte:0",
            "descripcion" => "required|string|max:255"  
        ];
    }

    public function messages()
    {
        return [
            "nombre.required" => "Se requiere el nombre del producto",
            "precio.required" => "Se requiere el precio",
            "descripcion.required" => "Se requiere una descripción"
        ];
    }

    public function attributes(){
        return[
            "nombre" => "Nombre de producto",
            "precio" => "Precio del producto",
            "descripcion" => "Descripción del producto"
        ];
    }
}
