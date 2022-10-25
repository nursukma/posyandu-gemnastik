<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function logout()
    {
        // Session::flush();
        Auth::logout();
        notify()->success('Berhasil Logout!');
        return redirect('/login');
    }

    public function signin(Request $request)
    {
        $request->validate([
            'user_nama' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('user_nama', 'password');
        if (auth()->attempt($credentials)) {
            notify()->success('Berhasil Login!');
            return redirect()->intended('dashboard');
        }

        notify()->error('Nama Pengguna / Password Salah!');
        return redirect('login');
    }

    public function dashboard()
    {
        if (Auth::check()) {
            return view('dashboard');
        }

        return redirect('login')->withSuccess('Tidak dapat akses masuk');
    }
}