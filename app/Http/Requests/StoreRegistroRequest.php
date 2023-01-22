<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rules\File;
use Illuminate\Foundation\Http\FormRequest;

class StoreRegistroRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'tipodocumento' => ['required', 'string', 'max:50'],
            'nrodocumento' => ['required', 'numeric', 'digits_between:8,11'],
            'entidad'      => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'celular' => ['required', 'numeric', 'digits:9'],
            'area'  => ['required', 'string', 'max:255'],
            'asunto'    => ['string'],
            'archivo'   => ['required', 'file', 'mimes:pdf,doc,docx,ppt,pptx,xls', 'max:1024'],
        ];

    }
    public function messages()
    {
        return [
            'required' => '* Dato Obligatorio',
            'max' => 'Ingrese Máximo :max caracteres',
            'string' => 'Ingrese caracteres alfanuméricos',
            'numeric' => 'Ingrese solo numeros',
            'unique' => 'El :email ya existe'
        ];
    }
}
