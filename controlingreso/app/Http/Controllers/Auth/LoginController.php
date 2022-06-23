<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index()
    {
        return view('Auth.login');
    }

    public function login(Request $request)
    {
        $ValidData = $request->validate([
            'email' => 'required|min:5',
            'password' => 'required|min:6'
        ],[
            'email.required' => 'Este campo es requerido',
            'password.required' => 'La contraseña es requerida',
            'password.min' => 'La contraseña debe tener mínimo 6 caracteres'
        ]);
        
        $user = User::where('email', $request->email)->first();

        if($user)
        {
            if (Hash::check($request->password, $user->password)) 
            {
                Auth::login($user);
                return redirect('/employees');
            }
            
            return redirect('/auth/login')->with([$request,['Message Error'=>'Datos invalidos']]);
        }

    }

    public function redirectPath()
    {
        if(Auth::user())
        {
            return view('Employee.index');
        }

        return view('Auth.login');        

    }

    public function logout()
    {
        Auth::logout();
        return redirect('/auth/login');
    }

   
}
