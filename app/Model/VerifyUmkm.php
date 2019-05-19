<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VerifyUmkm extends Model
{
    protected $table = 'verify_umkm';
    protected $guarded = ['id'];

    protected $casts = [
        'bukti' => 'array',
    ];
}
