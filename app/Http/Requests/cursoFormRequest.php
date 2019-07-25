<?php

namespace estudiantes\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class cursoFormRequest extends FormRequest
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

            'idmaterias'=>'required',
            'nombre'=>'required|max:45',
            'salon_curso'=>'required|max:45',
            
        ];
    }
}
