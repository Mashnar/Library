<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function logout()
    {
         auth()->logout();
          return redirect('login');
    }


    public function login(Request $request)
    {

         $credentials = [
        'email' =>$request['email'],
        'password' => $request['password'],
    ];


    if (Auth::attempt($credentials)) {
/*

      return view("main.main_page",["test"=>$test]);
      */

      $user = User::findOrFail(Auth::user()->id);

      if ($user->role=='Admin')
      {
         Auth::loginUsingId($user->id);
         return redirect()->to('/admin');
       
      }
      else
      {
             Auth::loginUsingId($user->id);
             
               return redirect()->to('/home');
      }
    }

}
}