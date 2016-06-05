<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

abstract class Request extends FormRequest
{
    //
    public function rules()
    {
        return [
            'nama_barang'   =>'required',
            'model'  =>'required',
            'deskripsi'        =>'required'
        ];
    }
}
