<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransaksiRequest extends FormRequest
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
            'tanggal_pinjam' => 'required',
            'tanggal_kembali' => 'required',
            'buku_id' => 'required',
            'anggota_id' => 'required',
        ];
    }
    public function messages ()
    {
        return [
            'tanggal_pinjam.required' => 'Tanggal Pinjam Tidak Boleh Kosong',
            'tanggal_kembali.required' => 'Tanggal Kembali Tidak Boleh Kosong',
            'buku_id.required' => 'Judul Buku Tidak Boleh Kosong',
            'anggota_id.required' => 'Nama Anggota Tidak Boleh Kosong',
        ];
    }
}
