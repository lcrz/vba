<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoriaRequest extends FormRequest
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
        $categoria = $this->route('categoria');
        $categoriaId = is_object($categoria) ? $categoria->id : $categoria;

        return [
            'nombre' => 'required|max:255|unique:categorias,nombre,' . $categoriaId,
            'slug' => 'required|max:255',
            'descripcion' => 'nullable|string',
            'activa' => 'boolean',
        ];
    }
}
