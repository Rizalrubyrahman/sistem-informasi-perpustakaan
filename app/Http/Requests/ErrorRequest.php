<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ErrorRequest extends FormRequest
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
            'email' => 'required',
            'nama' => 'required|min:3',
            'jenis_kelamin' => 'required',
            'no_hp' => 'required|max:13',
            'alamat' => 'required',
            'foto' => 'required',
            'password' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'email.required' => 'Email Tidak Boleh Kosong',
            'password.required' => 'Password Tidak Boleh Kosong',
            'nama.required' => 'Nama Tidak Boleh Kosong',
            'nama.min' => 'Nama Minimal 3 Karakter',
            'jenis_kelamin.required' => 'Jenis Kelamin Tidak Boleh Kosong',
            'no_hp.required' => 'No Hp Tidak Boleh Kosong',
            'no_hp.max' => 'No Hp Tidak Boleh Melebihi 13 Angka',
            'alamat.required' => 'Alamat Tidak Boleh Kosong',
            'foto.required' => 'Foto Profile Tidak Boleh Kosong',
            
        ];
    }
}
