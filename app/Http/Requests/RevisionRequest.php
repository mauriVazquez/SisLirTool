<?php

namespace App\Http\Requests;

use GuzzleHttp\Middleware;
use Illuminate\Foundation\Http\FormRequest;

class RevisionRequest extends FormRequest
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
            'titulo' => 'required|unique:revisiones|max:255',
            'meta_necesidad_informacion' => 'required',
            'investigadores' => 'array|min:1|required'
        ];
    }
}
