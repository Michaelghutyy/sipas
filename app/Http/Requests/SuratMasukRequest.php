<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class SuratMasukRequest extends FormRequest
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
                'nosuratMasuk'   => 'required|string|max:255',
                'tglSurat'       => 'required|date',
                'tglsuratMasuk'  => 'required|date',
                'asalSurat'      => 'required|string|max:255',
                'perihal'        => 'required|string|max:255',
                'fileSurat'      => 'mimes:pdf,doc,docx|max:5120',
            ];
        }else{
            $rules = [
                'kodesuratMasuk' => 'required|string|max:255',
                'nosuratMasuk'   => 'required|string|max:255',
                'tglSurat'       => 'required|date',
                'tglsuratMasuk'  => 'required|date',
                'asalSurat'      => 'required|string|max:255',
                'perihal'        => 'required|string|max:255',
                'fileSurat'      => 'required|mimes:pdf,doc,docx|max:5120',
            ];
        }

        return $rules;
    }

    public function messages() {
        return [
            'kodesuratMasuk.required' => 'Kode Surat Masuk harus diisi',
            'nosuratMasuk.required'   => 'Nomor Surat Masuk harus diisi',
            'tglSurat.required'       => 'Tanggal Surat harus diisi',
            'tglsuratMasuk.required'  => 'Tanggal Surat Masuk harus diisi',
            'asalSurat.required'      => 'Asal Surat harus diisi',
            'perihal.required'        => 'Perihal harus diisi',
            'fileSurat.required'      => 'File Surat harus diisi',
            'fileSurat.mimes'         => 'File Surat harus berupa file PDF, DOC, DOCX',
            'fileSurat.max'           => 'File Surat tidak boleh lebih dari 5 MB',
        ];
    }
}
