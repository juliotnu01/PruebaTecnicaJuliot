<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class proyectoStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'titulo' => 'require|string|max:144',
            'descripcion' => 'require|string|max:255',
            'img' => 'image|max:1024',
            'isBorrador' => 'require|boolean',
        ];
    }
}
