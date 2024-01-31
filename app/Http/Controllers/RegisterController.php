<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Providers\RouteServiceProvider;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5',
        ]);
    
        if ($validator->fails()) {
            return redirect('/register')
                        ->withErrors($validator)
                        ->withInput();
        }
    
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->input('role');
    
    
        $user->save();
    
       
    
        return redirect('/'); // Sesuaikan dengan halaman yang sesuai
    }
    
    protected function registered($request, $user)
    {
        // Set flash session dengan pesan sukses
        session()->flash('success', 'Registrasi berhasil! Selamat datang, ' . $user->name);
    
        return redirect(RouteServiceProvider::HOME);
    }
    }