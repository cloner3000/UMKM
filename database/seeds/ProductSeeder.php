<?php

use Illuminate\Database\Seeder;
use Faker\Factory;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $img = ["https://cdn.macrumors.com/article-new/2018/02/galaxy-s9-iphone-x.jpg","https://images-na.ssl-images-amazon.com/images/I/81TGHYLM3TL._SL1500_.jpg","https://images-na.ssl-images-amazon.com/images/I/915ypI%2BFeJL._SL1500_.jpg"];
        $img2 = ["https://2inn3u3s3k9e1asyaw3g5gb6-wpengine.netdna-ssl.com/wp-content/uploads/2018/08/4k-firestick-tech-gift-2019-e1556644234163.jpg","https://ak1.ostkcdn.com/images/products/is/images/direct/409d2c3142241a25d0b1b4e079b84d9607eacc00/NEW-OEM-Philips-Remote-Control-Originally-Shipped-With-BDP2305%2C-BDP2305-F7.jpg"];
        $faker = Factory::create('id_ID');
        $umkm = \App\Model\Umkm::all();
        foreach ($umkm as $data) {
            for ($i = 0; $i <= 5; $i++) {
                \App\Model\Produk::create([
                    'umkm_id' => $data->id,
                    'nama' => $faker->word,
                    'short_desc' => $faker->word,
                    'long_desc' => $faker->sentence,
                    'keyword' =>$faker->sentence,
                    'kategori_ids' => ["3","4","5"] ,
                    'harga' => $faker->numerify('#######'),
                    'persediaan'=> 5,
                    'purchase_order' => false,
                    'pic1' => $img,
                    'status' => 'Terverivikasi',
                    'rating' => random_int(1,5),
                    'isHide' => false,
                    'isDiscount' => false,
                    'discount' => 0
                ]);
            }
            for ($i = 0; $i <= 3; $i++) {
                \App\Model\Produk::create([
                    'umkm_id' => $data->id,
                    'nama' => $faker->word,
                    'short_desc' => $faker->word,
                    'long_desc' => $faker->sentence,
                    'keyword' =>$faker->sentence,
                    'kategori_ids' => ["2","7","13"] ,
                    'harga' => $faker->numerify('#######'),
                    'persediaan'=> 0,
                    'pic1' => $img2,
                    'purchase_order' => true,
                    'status' => 'Terverivikasi',
                    'rating' => random_int(1,5),
                    'isHide' => false,
                    'isDiscount' => true,
                    'discount' => random_int(1,99)
                ]);
            }
        }
    }
}
