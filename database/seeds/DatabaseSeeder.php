<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(JenisSeeder::class);
        $this->call(KategoriSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ProductSeeder::class);
    }
}
