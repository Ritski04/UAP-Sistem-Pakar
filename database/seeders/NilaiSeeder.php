<?php

namespace Database\Seeders;

use App\Models\nilai;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NilaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'nilai'         =>  [0,0.1,0.2,0.3,0.4,0.5,0.6,0.7,0.8,0.9],
            'keterangan'    =>  [
                'Tidak yakin sama sekali',
                'Sangat tidak yakin',
                'Tidak yakin',
                'Sedikit tidak yakin',
                'Ragu-ragu',
                'Cukup yakin',
                'Yakin',
                'Lebih yakin',
                'Hampir sangat yakin',
                'Sangat yakin'
            ]
        ];
        $nilai = new nilai();
        foreach ($data['nilai'] as $key => $value) {
            $nilai->create([
                'nilai'     =>  $value,
                'keterangan'=>  $data['keterangan'][$key]
            ]);
        }
    }
}
