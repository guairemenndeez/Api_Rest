<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $usuario = $this->user();
        return $usuario != null && $usuario->tokenCan('create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'usuario_id'=>['required',Rule::exists('usuarios','id')],
            'categoria_id'=>['required',Rule::exists('categorias','id')],
            'titulo'=>['required'],
            'cuerpo'=>['required'],
            'imagen'=>['required']
        ];
    }
}
