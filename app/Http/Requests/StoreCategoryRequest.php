<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        if (Auth::user() == null || !Auth::user()->isAdmin) {
            return false;
        }
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O Nome da Categoria é obrigatório.',
            'name.max' => 'O Nome da Categoria não pode exceder 255 carateres.',
        ];
    }
}
