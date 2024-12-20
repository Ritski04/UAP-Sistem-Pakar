<?php

namespace Database\Seeders;

use App\Models\Gejala;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GejalaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'kode_gejala'   =>  [
                'G-001',
                'G-002',
                'G-003',
                'G-004',
                'G-005',
                'G-006',
                'G-007',
                'G-008',
                'G-009',
                'G-010',
                'G-011',
                'G-012',
                'G-013',
                'G-014',
                'G-015',
                'G-016',
                'G-017',
                'G-018',
                'G-019',
                'G-020',
                'G-021',
                'G-022',
                'G-023',
                'G-024',
                'G-025',
            ],
            'nama_gejala'   =>  [
                'Kulit kemerahan',
                'Gatal',
                'Lepuh berisi cairan',
                'Kulit kering atau pecah-pecah',
                'Sensasi terbakar',
                'Bercak merah pada kulit',
                'Kulit kering pecah-pecah yang bisa berdarah',
                'Gatal, nyeri, atau sensasi terbakar pada area yang terkena',
                'Sendi bengkak dan kaku',
                'Gatal intens, terutama dimalam hari',
                'kulit merah, kering, atau bersisik',
                'Bercak-bercak kasar',
                'Lepuhan Kecil yang bisa pecah dan mengeluarkan cairan',
                'Kulit menjadi kasar dan menebal ketika digaruk',
                'Komedo',
                'Jerawat bernanah',
                'Benjolan keras dibawah kulit',
                'Kemerahan dan peradangan disekitar jerawat',
                'Bekas luka pada kulit',
                'Ruam kemerahan',
                'Gatal atau kesemutan di area yang terkena',
                'Demam dan kelelahan',
                'Luka akibat garukan',
                'Bercak merah berbentuh cincin',
                'Rambut rontok pada area infeksi'
            ]
        ];

        $gejala = new Gejala();
        foreach ($data['kode_gejala'] as $key => $value) {
            $gejala->create([
                'kode_gejala'   =>  $value,
                'nama_gejala'   =>  $data['nama_gejala'][$key]
            ]);
        }
    }
}
