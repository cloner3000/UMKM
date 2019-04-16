<?php

use Illuminate\Database\Seeder;
use App\Model\JenisUmkm;

class JenisSeeder extends Seeder
{
    const INDUSTRI = [
        'Agribisnis',
        'Akuntan',
        'Alas Kaki',
        'Asuransi',
        'Bioteknologi / biologi',
        'Biro Perjalanan',
        'Kertas',
        'Desain Interior',
        'E-Commerce',
        'Ekspedisi / Agen cargo',
        'Elektronika',
        'Energi',
        'Farmasi',
        'Furnitur',
        'Garmen / Tekstil',
        'Hiburan',
        'Hotel',
        'Hukum',
        'Internet',
        'Jasa Pemindahan',
        'Jasa Pengamanan',
        'Kecantikan',
        'Kehutanan',
        'Kelautan',
        'Keramik',
        'Keuangan / Bank',
        'Kimia',
        'Komputer (IT Hardware)',
        'Komputer / TI',
        'Konstruksi',
        'Konsultan',
        'Kosmetik',
        'Kulit',
        'Kurir',
        'Logam',
        'Logistik',
        'Mainan',
        'Makanan Dan Minuman',
        'Manajemen Fasilitas',
        'Manufaktur',
        'Media',
        'Mekanik / Listrik',
        'Mesin / Peralatan',
        'Minyak dam Gas',
        'Otomotif',
        'Pemerintahan',
        'Pendidikan',
        'Penerbangan',
        'Perawatan Kesehatan',
        'Percetakan',
        'Perdagangan Komoditas',
        'Perdagangan Umum',
        'Pergudangan',
        'Perikanan',
        'Periklanan',
        'Permata dan Perhiasan',
        'Pertambangan dan Mineral',
        'Produk Konsumen',
        'Properti',
        'Pupuk Pestisida',
        'Ritel',
        'Servis',
        'Telekomunikasi',
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (static::INDUSTRI as $industri) {
        JenisUmkm::create([
            'name' => $industri
        ]);
    }
    }
}
