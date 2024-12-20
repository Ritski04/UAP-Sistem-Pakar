<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class pasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::where('role','user')->get();
        return view('admin.pengguna',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'          =>  'required',
            'email'         =>  'required|email|unique:users,email',
            'username'      =>  'required|unique:users,username',
            'alamat'        =>  'required',
            'tanggal_lahir' =>  'required|date',
            'tempat_lahir'  =>  'required',
            'no_hp'         =>  'required',
            'jenis_kelamin' =>  'required',
        ],[
            'required'  =>  ':attribute wajib diisi',
            'email'     =>  ':attribute tidak valid',
            'unique'    =>  ':attribute sudah terdaftar',
            'date'      =>  ':attribute harus berupa tanggal',
        ]);
        $user = new User;
        $tambah = $user->factory()->create([
            'nama'          =>  $request->name,
            'email'         =>  $request->email,
            'username'      =>  $request->username,
            'alamat'        =>  $request->alamat,
            'tanggal_lahir' =>  $request->tanggal_lahir,
            'tempat_lahir'  =>  $request->tempat_lahir,
            'hp'            =>  $request->no_hp,
            'gender'        =>  $request->jenis_kelamin,
            'password'      =>  bcrypt('password'),
            'role'          =>  'user',
        ]);
        return $tambah ? redirect(route('pengguna.index'))->with('success','Data berhasil ditambahkan') : redirect()->back()->with('error','Data gagal ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request,[
            'name'          =>  'required',
            'email'         =>  'required',
            'username'      =>  'required',
            'alamat'        =>  'required',
            'tanggal_lahir' =>  'required|date',
            'tempat_lahir'  =>  'required',
            'no_hp'         =>  'required',
            'jenis_kelamin' =>  'required',
        ],[
            'required'  =>  ':attribute wajib diisi',
            'email'     =>  ':attribute tidak valid',
            'unique'    =>  ':attribute sudah terdaftar',
            'date'      =>  ':attribute harus berupa tanggal',
        ]);
        $user = User::findOrFail($id);
        $update = $user->update([
            'nama'          =>  $request->name,
            'email'         =>  $request->email,
            'username'      =>  $request->username,
            'alamat'        =>  $request->alamat,
            'tanggal_lahir' =>  $request->tanggal_lahir,
            'tempat_lahir'  =>  $request->tempat_lahir,
            'hp'            =>  $request->no_hp,
            'gender'        =>  $request->jenis_kelamin,
        ]);
        return $update ? redirect( route('pengguna.index') )->with('success','Data berhasil diperbarui') : redirect( route('user.index') )->with('error','Data gagal diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $delete = $user->delete();
        return $delete ? redirect( route('pengguna.index') )->with('success','Data berhasil dihapus') : redirect( route('user.index') )->with('error','Data gagal dihapus');
    }
}
