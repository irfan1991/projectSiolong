<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Foundation\Auth\PasswordsBroker;
use App\UserUbah;
class PasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Create a new password controller instance.
     *
     * @return void
     */

     protected $redirectTo = '/';
    public function __construct()
    {
        $this->middleware('guest');
    }

     protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|max:255|unique:users',
             'email' => 'required|email|max:255|unique:users',
          'password' => 'required|min:255|',
          'password_confirmation' => 'min:6|same:password'
        ]);
    }

   

    
}
