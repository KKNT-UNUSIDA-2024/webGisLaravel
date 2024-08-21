<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TempatUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nama_tempat' => 'required|string|max:255',
            'Kategori_id' => 'required|integer',
            'latitude' => 'required|string|max:255',
            'longitude' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:255',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
}
