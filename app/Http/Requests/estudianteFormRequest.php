<?php

namespace estudiantes\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class estudianteFormRequest extends FormRequest
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
            'idcurso'=>'required',
            'nombre'=>'required|max:45',
            'edad'=>'required|max:45',   
        ];
    }
}
