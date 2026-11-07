<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        if (Auth::user() == null) {
            return false;
        }
        if (!Auth::user()->isAdmin) {
            return false;
        }
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|max:255',
            'desc' => 'required|max:255',
            'cat' => 'required',
            'cost' => 'required|max:20',
            'img' => 'required|url',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O Nome do Produto é obrigatório.',
            'name.max' => 'O Nome do Produto não pode exceder 255 carateres.',
            'desc.required' => 'A Descrição do Produto é obrigatória.',
            'desc.max' => 'A Descrição do Produto não pode exceder 255 carateres.',
            'cat.required' => 'A Categoria é obrigatória.',
            'cost.required' => 'O Preço do Produto é obrigatório.',
            'cost.max' => 'O Preço do Produto não pode exceder 20 dígitos.',
            'img.url' => 'O formato da imagem não é válido.',
        ];
    }
}
