<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormAnggotaRequest extends FormRequest
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
            'nama' => 'required|min:3',
            'kelas' => 'required',
            'alamat' => 'required|min:3',
            
        ];
    }
    public function messages()
    {
        return [
            'nama.required' => 'Nama Anggota Tidak Boleh Kosong',
            'nama.min' => 'Nama Anggota Minimal 3 Karakter',
            'kelas.required' => 'Kelas Tidak Boleh Kosong',
            'alamat.required' => 'Alamat Tidak Boleh Kosong',
            'alamat.min' => 'Alamat Minimal 3 Karakter',
            
        ];
    }
}
