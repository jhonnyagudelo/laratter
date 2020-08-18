<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MessagesRequest extends FormRequest
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
            'content' => 'required|max:160'
        ];
    }
    
    public function message(){
        return  [
            'content.required' => 'Por favor escriba no sea mk',
            'content.max' => 'El mensaje no puede superar 3 caracteres, me da pereza leer'
        ];
    }
}
