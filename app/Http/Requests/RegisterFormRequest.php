<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class RegisterFormRequest extends Request
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
         'email' => 'required|email|max:255|unique:users',
            //
        ];
    }

    public function messages()
  {
    return [
        //'required'  => 'Your :attribute is required.',
       // 'min'  => ':attribute must be at least :min characters in length.',
        'email' => 'aLLrEADY.',
    ];
  }
  
  public function messages()
{
    return [
        'email.required' => 'Er, you forgot your email address!',
        'email.unique' => 'Email already taken m8',
    ];
}
}
