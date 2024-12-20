<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class authController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function daftar(){
        return view('auth.daftar');
    }

    public function loginProcess(Request $request)
{
    $input = $request->all();

    $this->validate($request, [
        'username' => 'required',
        'password' => 'required',
    ], [
        'required' => ':attribute tidak boleh kosong',
    ]);

    $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

    // Temukan user berdasarkan username atau email
    $user = \App\Models\User::where($fieldType, $input['username'])->first();

    // Verifikasi password sebagai string biasa
    if ($user && $user->password === $input['password']) {
        Auth::login($user);

        if (Auth::user()->role == 'admin') {
            return redirect()->route('admin.dashboard')->withSuccess('Welcome, ' . Auth::user()->nama);
        } elseif (Auth::user()->role == 'user') {
            return redirect()->route('user.dashboard')->withSuccess('Welcome, ' . Auth::user()->nama);
        }
    }

    return redirect()->back()->withErrors(['username' => 'Username atau password salah']);
}


    public function daftarProcess(Request $request){
        $this->validate($request,[
            'name'          =>  'required',
            'email'         =>  'required|email|unique:users,email',
            'username'      =>  'required|unique:users,username',
            'alamat'        =>  'required',
            'tanggal_lahir' =>  'required|date',
            'tempat_lahir'  =>  'required',
            'no_hp'         =>  'required',
            'jenis_kelamin' =>  'required',
            'password'      =>  'required|min:8'
        ],[
            'required'  =>  ':attribute wajib diisi',
            'email'     =>  ':attribute tidak valid',
            'unique'    =>  ':attribute sudah terdaftar',
            'date'      =>  ':attribute harus berupa tanggal',
            'min'       =>  ':attribute harus minimal :min karakter',
        ]);
        $user = new User();
        $user->nama          = $request->name;
        $user->email         = $request->email;
        $user->username      = $request->username;
        $user->alamat        = $request->alamat;
        $user->tanggal_lahir = $request->tanggal_lahir;
        $user->tempat_lahir  = $request->tempat_lahir;
        $user->hp            = $request->no_hp;
        $user->gender        = $request->jenis_kelamin;
        $user->password      = $request->password; // Hash password input
        $user->role          = 'user';

        if($user->save()){
            return redirect(route('auth.login'))->withSuccess('Akun berhasil dibuat');
        } else {
            return redirect()->back()->withErrors('Akun gagal dibuat');
        }
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('auth.login'));
    }
}
