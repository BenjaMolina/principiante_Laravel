<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
        //Ruta para editar usuarios/{usuario}
        //donde {usuario} es el usuario que se pasa por parametro
        //dd($this->route('usuario'));
        return [
            'name' => 'required',
            'email' => 'required|unique:users,email,'.$this->route('usuario') //unico en tabla usuarios, campo email e ignora el email del usuario
        ];
    }

    public function messages()
    {
        return [
            'required' => 'El  :attribute es obligatorio'
        ];
    }
}
