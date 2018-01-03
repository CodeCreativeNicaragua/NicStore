<?php

namespace NicStore\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocenteFormRequest extends FormRequest
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
            'primernombre'=>'required |max:30',
            'segundonombre'=>'max:30',
            'primerapellido'=>'required |max:30',
            'segundoapellido'=>'max:30',
            'imagen'=>'mimes:jpg,bmp,png,docx',
            'correo'=>'required |max:30',
            'celular'=>'|max:8',
            'idtipodocente'=>'required',
            
        ];
    }
}
