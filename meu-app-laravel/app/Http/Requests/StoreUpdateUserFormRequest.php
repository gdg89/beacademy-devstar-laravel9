<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateUserFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()//autorisar usuario? true
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()//crear regras
    {
        $id = $this->id ?? '';//recupera el id del request, si no encontrar el id qedara vacio.
        $rules = [
          'name'=> 'required|string|max:50|min:3',//Nombre obligatorio, tipo string, maximo 50 digitos, minimo 3.
          'email'=>[
            'required',
            'email',
            'unique:users,email,{$id},id'//email tiene que ser unico, pega del mmodel User,pega el {$id'} de la columna id de la tabla.(el id fue pasado en la primera linha del metodo)
          ],
          'password'=>[
            'required',
            'min:4',
            'max:12'
          ]
        ];

        if($this->method('PUT')){// si el metodo es PUT, tratar el password, el debe ser:
            $rule['password']= [
                'nulable',
                'min:4',
                'max:12'
            ];

        };
        return $rules;
    }
}
