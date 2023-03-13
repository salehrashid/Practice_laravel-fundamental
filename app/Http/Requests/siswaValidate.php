<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class siswaValidate extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
       return [
            "id_jenkel" => "required|integer",
            "nama" => "required|max:255",
            "tgl_lahir" => "required|date",
            "nik" => "required|min:10|max:11",
            "jurusan" => "required|max:3",
            "alamat" => "required|string|max:255",
            "angkatan" => "required|digits:2",
        ];
            /** untuk custom pesan error nya **/
            [
                //"nama.required" => "isi namanya cuy"
            ];
    }
}
