<?php

namespace App\Http\Controllers;

use App\Models\Gejala;
use Illuminate\Http\Request;

class GejalaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gejala = Gejala::all();
        return view('admin.gejala',compact('gejala'));
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
            'kode'  =>  'required|unique:gejalas,kode_gejala',
            'gejala'=>  'required'
        ],[
            'required'  =>  ':attribute wajib diisi',
            'unique'    =>  ':attribute sudah ada'
        ]);
        $gejala = new Gejala();
        $tambah = $gejala->create([
            'kode_gejala'   =>  $request->kode,
            'nama_gejala'   =>  $request->gejala
        ]);

        return $tambah ? redirect(route('gejala.index'))->withSuccess('Data berhasil ditambahkan') : redirect(back())->withErrors('Data gagal ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Gejala $gejala)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gejala $gejala)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'kode'  =>  'required',
            'gejala'=>  'required'
        ],[
            'required'  =>  ':attribute wajib diisi',
        ]);
        $gejala = Gejala::findOrFail($id);
        $edit = $gejala->update([
            'kode_gejala'   =>  $request->kode,
            'nama_gejala'   =>  $request->gejala,
        ]);
        return $edit ? redirect(route('gejala.index'))->withSuccess('Data berhasil diperbarui') : redirect(back())->withErrors('Data gagal diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $gejala = Gejala::findOrFail($id);
        $delete = $gejala->delete();
        return $delete ? redirect(route('gejala.index'))->withSuccess('Data berhasil dihapus') : redirect(back())->withErrors('Data gagal dihapus');
    }
}
