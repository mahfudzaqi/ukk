<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SesiController extends Controller
{
    function index() {
        return view('login');
    }
    function login(Request $request) {
        $request -> validate([
            'email'=>'required',
            'password'=>'required'
        ],[
            'email.required'=>'email wajid diisi',
            'password.required'=>'password wajid diisi',
        ]);

        $infologin = [
            'email'=>$request->email,
            'password'=>$request->password,
        ];

        if(Auth::attempt($infologin)){
            if(Auth::user()->role == 'admin') {
                return redirect('admin/admin');
            } elseif(Auth::user()->role == 'waiter') {
                return redirect('admin/waiter');
            }elseif (Auth::user()->role == 'kasir') {
                return redirect('admin/kasir');
            }
        }else {
            return redirect('')->withErrors('Username dan password yang dimasukkan tidak sesuai')->withInput();
        };
    }

    function logout() {
        Auth::logout();
        return redirect('');
    }
}
