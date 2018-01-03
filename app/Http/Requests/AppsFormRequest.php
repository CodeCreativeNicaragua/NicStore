<?php

namespace NicStore\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AppsFormRequest extends FormRequest
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
            'nombre'=>'required |max:256',
             'descripcion'=>'max:556',
             'imagen'=>'mimes:jpg,bmp,png',
             'idgrado'=>'required',
             'idasignatura'=>'required',
             'idunidad'=>'required',
             'idtema'=>'required',

             

        ];
    }
}
