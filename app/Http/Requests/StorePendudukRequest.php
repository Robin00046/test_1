<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePendudukRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // You can add your authorization logic here if needed
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            'nama' => 'required|string|max:255', // Assuming 'nama' is a string field
            'alamat' => 'required|string|max:255', // Assuming 'alamat' is a string field
            'tanggal_lahir' => 'required|date', // Assuming 'tanggal_lahir' is a date field
            'jenis_kelamin' => 'required', // Assuming 'jenis_kelamin' can be either 'Laki-laki' or 'Perempuan'
            'kabupaten_id' => 'required|exists:kabupatens,id', // Assuming 'kabupaten_id' is a foreign key referencing the 'kab
        ];
    }
}
