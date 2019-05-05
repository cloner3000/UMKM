<?php

use Illuminate\Database\Seeder;
use App\Model\Role;
use App\User;
use Faker\Factory;
use App\Model\DetailUser;
use App\Model\Umkm;
use App\Model\JenisUmkm;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('id_ID');

        $akses = [
            'root', 'dinskop', 'umkm', 'pembeli'
        ];

        foreach ($akses as $data) {
            $role = Role::create([
                'role_name' => $data,
                'status' => true
            ]);
            if ($data == 'root') {
                User::create([
                    'username' => 'ROOT',
                    'email' => 'system@root.com',
                    'password' => bcrypt('secret'),
                    'remember_token' => str_random(60),
                    'isDiskop' => true,
                    'role_id' => $role->id
                ]);
            } elseif ($data == 'dinskop') {
                $user = User::create([
                    'username' => $faker->name,
                    'email' => $faker->unique()->safeEmail,
                    'password' => bcrypt('secret'),
                    'remember_token' => str_random(60),
                    'isDiskop' => true,
                    'role_id' => $role->id
                ]);
                DetailUser::create([
                    'user_id' => $user->id,
                    'first_name' => $faker->firstNameMale,
                    'last_name' => $faker->lastName,
                    'gender' => 'Pria',
                    'date_of_birth' => $faker->dateTimeThisCentury,
                    'status' => 'Terverifikasi'
                ]);
            } elseif ($data == 'umkm') {
                for ($i = 0; $i < 6; $i++) {
                    $user = User::create([
                        'username' => $faker->company,
                        'email' => $faker->safeEmail,
                        'password' => bcrypt('secret'),
                        'remember_token' => str_random(60),
                        'isUmkm' => true,
                        'role_id' => $role->id
                    ]);
                    Umkm::create([
                        'user_id' => $user->id,
                        'avatar' => 'images/shop.png',
                        'nama' => $user->username,
                        'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ligula quam, porttitor
                     quis nisl eget, maximus consectetur dolor. Vestibulum venenatis nibh sit amet dui iaculis finibus. Cras laoreet venenatis aliquet. Donec maximus dui eget quam dignissim, in facilisis justo molestie. 
                     Sed sollicitudin, purus sed sollicitudin dictum, justo quam euismod dolor, eget rhoncus lacus neque eu ipsum. Pellentesque 
                     in pellentesque velit. Praesent eget turpis sem. Etiam aliquam a nisi sit amet elementum. Phasellus semper luctus ex, eu faucibus risus imperdiet id. Donec finibus leo felis, at vehicula lacus 
                     pretium id. Nulla scelerisque enim eget eros iaculis rhoncus. Morbi quis magna vitae libero pulvinar ultrices et non enim. Maecenas at tempus nisi. Cras convallis nunc vitae velit vehicula, faucibus finibus enim dignissim.',
                        'tgl_berdiri' => $faker->dateTimeThisCentury,
                        'nama_pemilik' => $faker->name,
                        'nik_pemilik' => $faker->randomNumber($nbDigits = NULL),
                        'alamat' => $faker->address,
                        'lat' => $faker->latitude,
                        'long' => $faker->longitude,
                        'jenis_id' => rand(JenisUmkm::min('id'), JenisUmkm::max('id')),
                        'aset' => $faker->numerify('###########'),
                        'omset' => $faker->numerify('########'),
                        'no_siup' => $faker->randomNumber($nbDigits = NULL),
                        'tgl_siup' => $faker->date('Y-m-d', 'now'),
                        'tgl_siup_exp' => $faker->date('Y-m-d', 'now'),
                        'npwp' => $faker->numerify('###########'),
                        'tdp' => $faker->numerify('###########'),
                        'tgl_tdp' => $faker->date('Y-m-d', 'now'),
                        'izin_ganguan' => 'NIHIl',
                        'tgl_izin_ganguan' => $faker->date('Y-m-d', 'now'),
                        'akta_notaris' => 'asdasdasdasdasasdas',
                    ]);
                }
            } elseif ($data == 'pembeli') {
                $user = User::create([
                    'username' => $faker->name,
                    'email' => $faker->unique()->safeEmail,
                    'password' => bcrypt('secret'),
                    'remember_token' => str_random(60),
                    'isGuest' => true,
                    'role_id' => $role->id
                ]);
                DetailUser::create([
                    'user_id' => $user->id,
                    'first_name' => $faker->firstNameMale,
                    'last_name' => $faker->lastName,
                    'gender' => 'Pria',
                    'date_of_birth' => $faker->dateTimeThisCentury,
                    'status' => 'Terverifikasi'
                ]);
            }
        }
    }
}
