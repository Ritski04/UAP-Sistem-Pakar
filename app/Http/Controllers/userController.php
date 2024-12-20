<?php

namespace App\Http\Controllers;

use App\Models\basisPengetahuan;
use App\Models\Gejala;
use App\Models\Hasil;
use App\Models\Penyakit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{
    public function myDashboard(){
        return view('user.dashboard');
    }

    public function myProfile(Request $request,$id){
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
        return $simpan ? redirect(route('user.dashboard'))->withSuccess('Biodata telah diperbarui') : redirect(back())->withErrors('Biodata gagal diperbarui');
    }

    public function diagnosa(){
        $gejala = Gejala::all();
        return view('user.diagnosa',compact('gejala'));
    }

    public function diagnosaProcess(Request $request){
        $inputGejala = $request->input('gejala');
        $userId = Auth::id();
        $cfResults = $this->calculateCertaintyFactor($inputGejala);
        $this->saveResults($userId, $cfResults);

        return view('user.hasil', compact('cfResults'));
    }

    public function riwayat()
    {
        $userId = Auth::id();
        \Carbon\Carbon::setLocale('id');

        // Ambil semua riwayat diagnosa dan kelompokkan berdasarkan `created_at` (tanggal saja)
        $riwayat = Hasil::with('penyakit')
            ->where('iduser', $userId)
            ->orderBy('created_at', 'desc')
            ->get()
            ->groupBy(function ($item) {
                return \Carbon\Carbon::parse($item->created_at)->format('d F Y H:i'); // Kelompokkan berdasarkan tanggal
            });

        // Jika ingin memproses data lebih lanjut, misalnya menambahkan hasil per tanggal:
        $riwayatDetail = $riwayat->map(function ($group) {
            return [
                'data' => $group, // Semua hasil dalam grup
                'highest_cf' => $group->sortByDesc('hasilcf')->first(), // Nilai CF terbesar
            ];
        });

        return view('user.riwayat', compact('riwayatDetail'));
    }

    
    private function calculateCertaintyFactor($inputGejala){
        $results = [];
        $penyakits = Penyakit::all();

        foreach ($penyakits as $penyakit) {
            $cfCombine = 0;
            $basisPengetahuan = basisPengetahuan::where('idpenyakit', $penyakit->id)->whereIn('idgejala', $inputGejala)->get();
            
            if ($basisPengetahuan->count() > 0) {
                foreach ($basisPengetahuan as $bp) {
                    $cfOld = 0;
                    $cf = $bp->mb->nilai - $bp->md->nilai;
                    if($cfOld > 0 && $cf > 0){
                        $cfCombine = $cfOld + ($cf * (1 - $cfOld));
                    }elseif($cfOld < 0 && $cf < 0){
                        $cfCombine = $cfOld + ($cf * (1 + $cfOld));
                    }else{
                        $cfCombine = ($cfOld+$cf)/(1-min(abs($cfOld), abs($cf)));
                    }
                    $cfOld = $cfCombine;
                }
                $finalCF = $cfOld;
                // print_r($cf);
                $results[] = [
                    'penyakit'      => $penyakit->nama_penyakit,
                    'cf'            => $finalCF,
                    'cf_percentage' => abs($cfCombine) * 100,
                    'solusi'        =>  $penyakit->solusi
                ];
            }
        }

        usort($results, function($a, $b) {
            return $b['cf_percentage'] <=> $a['cf_percentage'];
        });

        return $results;
    }

    private function saveResults($userId, $cfResults){
        foreach ($cfResults as $cfResult) {
            // dd($userId);
            Hasil::create([
                'iduser' => $userId,
                'idpenyakit' => penyakit::where('nama_penyakit', $cfResult['penyakit'])->first()->id,
                'hasilcf' => $cfResult['cf_percentage'],
            ]);
        }
    }

    public function deleteHistory($id){
        $delete = Hasil::where('iduser',$id)->delete();
        return $delete ? redirect(route('riwayat'))->withSuccess('Riwayat telah dibersihkan') : back()->withErrors('Riwayat gagal dibersihkan');
    }

    public function change(Request $request, $id) {
        $this->validate($request,[
            'password_lama'             =>  'required',
            'password_baru'             =>  'required|min:8',
            'konfirmasi_password_baru'  =>  'required|same:password_baru'
        ],[
            'required'  => ':attribute wajib diisi',
            'min'       =>  'panjang password minimal 8 karakter',
            'same'      =>  'password tidak sama'
        ]);
        $user = User::findOrFail($id);
        if(!Hash::check($request->password_lama, Auth::user()->password)){
            return back()->withErrors('Password sebelumnya tidak sesuai');
        }

        $update = $user->update([
            'password' =>  Hash::make($request->password_baru)
        ]);

        return $update ? redirect(route('user.dashboard'))->withSuccess('Password telah diperbarui') : redirect()->back()->withError('Password gagal diperbarui');
    }
}
