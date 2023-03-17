<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRekamMedikRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            // 'id' => 'required|integer',
            // 'nik' => 'required',
            // 'nama_pasien' => 'required',
            // 'jk' => 'required',
            // 'no_bpjs' => '',
            // 'alamat' => 'required',
            // 'no_hp' => 'required',
            // 'tanggal_lahir' => 'required',
            // 'umur' => 'required',
            // 'poli_id' => 'required',
            // 'tanggal_berobat' => 'required',
            // 'tipe_perawatan_id' => 'required',
        ];
    }
}
