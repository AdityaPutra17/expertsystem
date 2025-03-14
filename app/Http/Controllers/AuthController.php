<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function index(){
        return view('auth.login');
    }

    public function auth(Request $request){
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);


        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            $user = Auth::user();
            if($user-> role === 'admin'){
                return redirect()->intended('/admin');
            }else{
                return redirect()->intended('/');
            }
        }

        return back()->with('failed', 'SignIn Failed');
        // dd("anjayy login");

    }
    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
