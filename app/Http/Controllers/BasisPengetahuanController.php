<?php

namespace App\Http\Controllers;

use App\Models\basisPengetahuan;
use App\Models\Gejala;
use App\Models\nilai;
use App\Models\Penyakit;
use Illuminate\Http\Request;

class BasisPengetahuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penyakit = Penyakit::all();
        $gejala = Gejala::all();
        $nilai = nilai::all();
        $basis = basisPengetahuan::orderBy('idpenyakit')->get();
        return view('admin.basis',compact('penyakit','gejala','nilai','basis'));
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
            'penyakit'  =>  'required'
        ]);
        $idgejala = $request->input('idgejala');
        $idpenyakit = $request->input('penyakit');
        $idmb = $request->input('idmb');
        $idmd = $request->input('idmd');
        // dd($idgejala);
        $basis = new basisPengetahuan();
        foreach ($idgejala as $key => $value) {
            $cek = basisPengetahuan::where('idpenyakit',$idpenyakit)->where('idgejala',$value)->where('idmb',$idmb[$value])->where('idmd',$idmd[$value])->first();
            if($cek){
                $simpan = $cek->update([
                    'idpenyakit'    =>  $request->input('penyakit'),
                    'idgejala'      =>  $value,
                    'idmb'          =>  $idmb[$value],
                    'idmd'          =>  $idmd[$value],
                ]);
            }else{
                $simpan = $basis->create([
                    'idpenyakit'    =>  $request->input('penyakit'),
                    'idgejala'      =>  $value,
                    'idmb'          =>  $idmb[$value],
                    'idmd'          =>  $idmd[$value],
                ]);
            }
        }

        return $simpan ? redirect(route('basis.index'))->withSuccess('Data berhasil ditambahkan') : redirect(back())->withErrors('Data gagal ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(basisPengetahuan $basisPengetahuan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(basisPengetahuan $basisPengetahuan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $basis = basisPengetahuan::findOrFail($id);
        $this->validate($request,[
            'idpenyakit'    =>  'required',
            'idgejala'      =>  'required',
            'idmb'          =>  'required',
            'idmd'          =>  'required',
        ]);
        $simpan = $basis->update([
            'idpenyakit'    =>  $request->idpenyakit,
            'idgejala'      =>  $request->idgejala,
            'idmb'          =>  $request->idmb,
            'idmd'          =>  $request->idmd,
        ]);
        return $simpan ? redirect(route('basis.index'))->withSuccess('Data berhasil diperbarui') : back()->withErrors('Data gagal diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $basis = basisPengetahuan::findOrFail($id);
        $delete = $basis->delete();
        return $delete ? redirect(route('basis.index'))->withSuccess('Data berhasil dihapus') : redirect(back())->withErrors('Data gagal dihapus');
    }
}
