<?php

use Illuminate\Database\Seeder;
use App\Model\Kategori;

class KategoriSeeder extends Seeder
{
    const KATEOGRI = [
        'Alat Tulis Kantor',
        'Buku',
        'Dapur',
        'Elektronik',
        'Fashion Wanita',
        'Fashion pria',
        'Fashion muslim',
        'Fashion anak',
        'Gaming',
        'Handphone',
        'Ibu & Bayi',
        'Kecantikan',
        'Kesehatan',
        'Komputer $ Aksesoris',
        'Kamera',
        'Laptop & Aksesoris',
        'Mainan & Hobi',
        'Makanan & Minuman',
        'Otomotof',
        'Olahraga',
        'Perawatan Hewan',
        'Pertukangan',
        'Perawatan Tubuh',
        'Produk Lainnya',
        'Rumah Tangga',
        'Souvenir & Kado',
        'Software'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (static::KATEOGRI as $kategori) {
            Kategori::create([
                'name' => $kategori
            ]);
        }
    }
}
