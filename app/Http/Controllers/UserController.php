<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class UserController extends Controller
{
    //

    protected function validateEmail($email) {
        $user = User::where('email',$email)->get();
        if ($user->isEmpty()){
            return 'false';
        }else{
            return 'true';
        }
    }
}
