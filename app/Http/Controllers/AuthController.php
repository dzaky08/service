<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Log;

class AuthController extends Controller
{
    function Login() {
        return view('welcome');
    }

    function postLogin(Request $request) {
        $cek = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($cek)) {
            $user = Auth::user();
            $logMessage = $user->nama . ' melakukan login';

            Log::create([
                'aktivitas' => $logMessage,
                'user_id' => $user->id
            ]);
            if ($user->role == 'montir') {
                return redirect()->route('home-montir')->with('msg', 'Selamat Datang di Home', $user->nama);
            }elseif ($user->role == 'kasir') {
                return redirect()->route('home-kasir')->with('msg', 'Selamat Datang di Home', $user->nama);
            }elseif ($user->role == 'admin') {
                return redirect()->route('dash-admin')->with('msg', 'Selamat Datang di dashboard', $user->nama);
            }else{
                return redirect()->route('home-owner')->with('msg', 'Selamat Datang di Home', $user->nama);
            }
        }else {
            return redirect()->back()->with('msg', 'Username atau Password Salah!');
        }
    }

    function logout() {
        Auth::logout();

        return redirect()->route('login')->with('msg', 'berhasil logout');
    }
}
