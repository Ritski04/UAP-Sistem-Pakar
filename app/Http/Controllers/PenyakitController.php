<?php

namespace App\Http\Controllers;

use App\Models\Penyakit;
use Illuminate\Http\Request;

class PenyakitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penyakit = Penyakit::all();
        return view('admin.penyakit',compact('penyakit'));
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
        $this->validate($request, [
            'kode'      =>  'required|unique:penyakits,kode_penyakit',
            'penyakit'  =>  'required',
            'deskripsi' =>  'required',
            'solusi'    =>  'required'
        ],[
            'required'  =>  ':attribute wajib diisi',
            'unique'    =>  ':attribute sudah ada'
        ]);
        $penyakit = new Penyakit();
        $tambah = $penyakit->create([
            'kode_penyakit' =>  $request->kode,
            'nama_penyakit' =>  $request->penyakit,
            'deskripsi'     =>  $request->deskripsi,
            'solusi'        =>  $request->solusi
        ]);
        return $tambah ? redirect(route('penyakit.index'))->withSuccess('Data berhasil ditambahkan') : redirect(back())->withErrors('Data gagal ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Penyakit $penyakit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penyakit $penyakit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'kode'      =>  'required',
            'penyakit'  =>  'required',
            'deskripsi' =>  'required',
            'solusi'    =>  'required'
        ],[
            'required'  =>  ':attribute wajib diisi'
        ]);
        $penyakit = Penyakit::findOrFail($id);
        $edit = $penyakit->update([
            'kode_penyakit' =>  $request->kode,
            'nama_penyakit' =>  $request->penyakit,
            'deskripsi'     =>  $request->deskripsi,
            'solusi'        =>  $request->solusi
        ]);
        return $edit ? redirect(route('penyakit.index'))->withSuccess('Data berhasil diperbarui') : redirect(back())->withErrors('Data gagal diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $penyakit = Penyakit::findOrFail($id);
        $delete = $penyakit->delete();
        return $delete ? redirect(route('penyakit.index'))->withSuccess('Data berhasil dihapus') : redirect(back())->withErrors('Data gagal dihapus');
    }
}
