<?php

namespace App\Http\Controllers;

use App\Models\basisPengetahuan;
use App\Models\Gejala;
use App\Models\Penyakit;
use App\Models\User;
use Illuminate\Http\Request;

class adminController extends Controller
{
    public function index(){
        $ttu = User::where('role','user')->count();
        $ttp = Penyakit::count();
        $ttg = Gejala::count();
        $tbp = basisPengetahuan::count();
        return view('admin.dashboard', compact('ttu','ttp','ttg','tbp'));
    }

    public function profile(Request $request,$id){
        $this->validate($request,[
            'nama'          =>  'required',
            'alamat'        =>  'required',
            'tempat_lahir'  =>  'required',
            'tanggal_lahir' =>  'required',
            'gender'        =>  'required',
            'no_hp'         =>  'required',
            'email'         =>  'required',
            'username'      =>  'required',
        ],[
            'required'      =>  ':attribute wajib diisi'
        ]);
        $user = User::findOrFail($id);
        $simpan = $user->update([
            'nama'          =>  $request->nama,
            'alamat'        =>  $request->alamat,
            'tempat_lahir'  =>  $request->tempat_lahir,
            'tanggal_lahir' =>  $request->tanggal_lahir,
            'gender'        =>  $request->gender,
            'hp'            =>  $request->no_hp,
            'email'         =>  $request->email,
            'username'      =>  $request->username,
        ]);
        return $simpan ? redirect(route('admin.dashboard'))->withSuccess('Biodata telah diperbarui') : redirect(back())->withErrors('Biodata gagal diperbarui');
    }
}
