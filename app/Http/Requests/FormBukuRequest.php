<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormBukuRequest extends FormRequest
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
        return 
        [
            'kode_buku' => 'required',
            'judul' => 'required|min:3',
            'pengarang' => 'required',
            'penerbit' => 'required',
            'tahun' => 'required',
            'jumlah' => 'required',
        ];
    }
    public function messages()
    {
        return 
        [
            'kode_buku.required' => 'Kode Buku Tidak Boleh Kosong',
            'judul.required' => 'Judul Buku Tidak Boleh Kosong',
            'judul.min' => 'Judul Buku Minimal 3 Karakter',
            'pengarang.required' => 'Pengarang Tidak Boleh Kosong',
            'penerbit.required' => 'Penerbit Tidak Boleh Kosong',
            'tahun.required' => 'Tahun Tidak Boleh Kosong',
            'jumlah.required' => 'Jumlah Tidak Boleh Kosong',
        ];
    }
}
