<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class SuratKeluarRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if(in_array($this->method(), ['PUT', 'PATCH'])) {
            $rules = [
                'nosuratKeluar'       => 'required|string|max:255',
                'tglpembuatanSurat'   => 'required|date',
                'tglpengirimanSurat'  => 'required|date',
                'tujuanSurat'         => 'required|string|max:255',
                'perihal'             => 'required|string|max:255',
                'pembuat'             => 'required|string|max:255',
                'fileSurat'           => 'mimes:pdf,doc,docx|max:5120',
            ];
        }else{
            $rules = [
                'kodesuratKeluar'     => 'required|string|max:255',
                'nosuratKeluar'       => 'required|string|max:255',
                'tglpembuatanSurat'   => 'required|date',
                'tglpengirimanSurat'  => 'required|date',
                'tujuanSurat'         => 'required|string|max:255',
                'perihal'             => 'required|string|max:255',
                'pembuat'             => 'required|string|max:255',
                'fileSurat'           => 'required|mimes:pdf,doc,docx|max:5120',
            ];
        }

        return $rules;
    }

    public function messages() {
        return [
            'kodesuratKeluar.required'    => 'Kode Surat Keluar harus diisi',
            'nosuratKeluar.required'      => 'Nomor Surat Keluar harus diisi',
            'tglpembuatanSurat.required'  => 'Tanggal Pembuatan Surat harus diisi',
            'tglpengirimanSurat.required' => 'Tanggal Pengiriman Surat harus diisi',
            'tujuanSurat.required'        => 'Tujuan Surat harus diisi',
            'perihal.required'            => 'Perihal harus diisi',
            'pembuat.required'            => 'Pembuat harus diisi',
            'fileSurat.required'          => 'File Surat harus diisi',
            'fileSurat.mimes'             => 'File Surat harus berupa file PDF, DOC, DOCX',
        ];
    }
}
