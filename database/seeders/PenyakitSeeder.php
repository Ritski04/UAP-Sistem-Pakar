<?php

namespace Database\Seeders;

use App\Models\Penyakit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PenyakitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'kode_penyakit' =>  [
                'P-001',
                'P-002',
                'P-003',
                'P-004',
                'P-005',
                'P-006',
                'P-007',
                'P-008',
            ],
            'nama_penyakit' =>  [
                'Dermatitis Kontak',
                'Psoriasis',
                'Eksim (Eczema)',
                'Pytiriasis Rosea',
                'Jerawat (acne)',
                'Herpes Zoster',
                'Kudis (Scabies)',
                'Kurap (Tinea)'
            ],
            'deskripsi'     =>  [
                'Reaksi kulit akibat kontak langsung dengan zat iritan atau alergen yang menyebabkan kulit kemerahan, gatal dan peradangan',
                'Penyakit autoimun yang menyebabkan sel kulit tumbuh lebih cepat dari biasanya, menghasilkan bercak merah dan sisik tebal',
                'Peradangan kronis pada kulit yang ditandai dengan gatal, kulit kering, dan bercak kemerahan. Sering kali dipicu oleh alergi atau stress',
                'Kondisi kulit yang dimulai dengan bercak besar dan diikuti oleh bercak-bercak kecil. Biasanya Sembuh dengan sendirinya dakan 6 hingga 8 minggu',
                'Kondisi kulit yang disebabkan oleh penyumbatan pori-pori dengan minyak dan sel kulit mati, sering disertai dengan peradangan',
                'Infeksi virus yang menyebabkan ruam menyakitkan dengan lepuhan. Disebabkan oleh reaktivasi virus cacar air (Varisella-zoster)',
                'Infeksi kutu Sarcoptes Scabiei yang menyebabkan gatal ekstrem, terutama di malam hari dan ruam',
                'Infeksi jamur pada kulit yang menyebabkan bercak bulat merah dan gatal. Bisa terjadi diberbagai bagian tubuh'
            ],
            'solusi'        =>  [
                'Hindari kontak dengan alergen atau zat iritan, gunakan salep kortikosteroid untuk mengurangi peradangan, dan pelembab untuk menjaga kelembaban kulit',
                'Pengobatan topikal seperti salep kortikorsteroid, terapi cahaya UV, atau obat oral/imunomodulator untuk menekan sistem kekebalan tubuh',
                'Gunakan pelembab, hindari pemicu alergen, dan gunakan obat kortikosteroid atau atihistamin untuk mengurangi gejala',
                'Biasanya tidak membutuhkan pengobatan khusus, tetapi obat antihistamin atau krim kortikosteroid dapat membantu mengurangi gatal',
                'Pembersihan kulit secara rutin, penggunaan obat topikal seperti retinoid atau benzoil peroksida, serta pengobatan oral seperti antibiotik atau isotretioin',
                'Pengobatan antiviral seperti asiklovir, serta pereda nyeri untuk mengurangi ketidaknyamanan',
                'Krim dan Lotion antikutu seperti permetrin, serta mencuci semua pakaian dan tempat tidur yang terkontaminasi',
                'Krim antijamur atau obat antijamur oral untuk menghentikan pertumbuhan jamur'
            ]
        ];

        $penyakit = new Penyakit();
        foreach ($data['kode_penyakit'] as $key => $value) {
            $penyakit->create([
                'kode_penyakit' =>  $value,
                'nama_penyakit' =>  $data['nama_penyakit'][$key],
                'deskripsi'     =>  $data['deskripsi'][$key],
                'solusi'        =>  $data['solusi'][$key],
            ]);
        }
    }
}
