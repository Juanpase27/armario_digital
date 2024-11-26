<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    public function login()
    {
        # return 'Post login'
        $credentials = request()->only('email', 'password');


        if (Auth::attempt($credentials)) {
            request()->session()->regenerate();
            #return redirect('dashboard');
            return redirect()
                ->intended('dashboard')
                ->with('status', 'Estás logeado');
        }
        return redirect('login');
    }
    public function logout(Request $request, Redirector $redirect)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return $redirect->to('/')
        ->with('status', 'Te deslogueaste');;
    }
}
