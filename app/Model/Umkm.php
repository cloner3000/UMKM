<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Umkm extends Model
{
    protected $table = 'umkm';
    protected $guarded = ['id'];
    protected $casts = [
        'jenis_id' => 'array',
    ];

    public function getVerify()
    {
        return $this->hasOne('App\Model\VerifyUmkm','umkm_id');
    }



}
