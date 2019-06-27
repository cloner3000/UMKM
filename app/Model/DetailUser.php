<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DetailUser extends Model
{
    protected $table = 'detail_users';
    protected $fillable = [
        'user_id', 'first_name', 'last_name', 'gender', 'date_of_birth', 'status','alamat','no_telp','avatar',
        'kecamatan', 'kelurahan', 'zip_code'
    ];
}
