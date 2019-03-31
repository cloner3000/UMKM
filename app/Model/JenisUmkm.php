<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class JenisUmkm extends Model
{
    protected $table = 'jenis_umkms';
    protected $fillable = [
        'name',
    ];
}
