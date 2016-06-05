<?php

namespace App\Http\Controllers\Auth;

use Input;
use Auth;
use Session;
use App\User;
use Intervention\Image\Facades\Image;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use App\Http\Requests\RegisterFormRequest;
use Illuminate\Http\Request;
use App\Role;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */
    

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
   protected $redirectTo = '/';
    protected $username = 'username';
   
protected function authenticated($request, $user)
    {
        if($user->role === 'admin') {
            return redirect()->intended('/admin');
        }

        return redirect('/');
    }
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
  
           
       public function verify(Request $request, $token)
                    {
                                $email = $request->get('email');
                                $user = User::where('verification_token', $token)->where('email', $email)->first();
                                if ($user) {
                                $user->verify();
                                Session::flash("flash_notification", [
                                "level"=>"success",
                                "message"=>"Berhasil melakukan verifikasi."
                                ]);
                                Auth::login($user);
                                }
                                return redirect('/');
                    }


    public function sendVerification(Request $request)
                {
                $user = User::where('email', $request->get('email'))->first();
                if ($user && !$user->is_verified) {
                $user->sendVerification();
                Session::flash("flash_notification", [
                "level"=>"success",
                "message"=>"Silahkan klik pada link aktivasi yang telah kami kirim."
                ]);
                }
                return redirect('auth/login');
                }

   
            public function __construct()
    {
        $this->middleware('guest', ['except' => ['logout', 'getLogout']]);
        $this->middleware('user-should-verified');
        
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|max:255|unique:users',
             'email' => 'required|email|max:255|unique:users',
         
                ]);
    }



    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {

$fileName = 'null';
    //if (Input::file('image')->isValid()) {
        $destinationPath = public_path('img/user/');
        $extension = Input::file('image')->getClientOriginalExtension();
        $fileName = uniqid().'.'.$extension;
       $upload = Input::file('image')->move($destinationPath, $fileName);
       
  //}
     $user=User::create([
             'username' => $data['username'],
             'name' => $data['name'],
            'email' => $data['email'],
            'addres' => $data['addres'],
             'city' => $data['city'],
             'image' => $fileName,
            'country' => $data['country'],
        'password' => bcrypt($data['password']),
        ]);

        $memberRole = Role::where('name', 'member')->first();
        $user->attachRole($memberRole);
        $user->sendVerification();
        return $user;
      


    }

    
    
}


