<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class VerifyUmkm extends Model
{
    protected $table = 'verify_umkm';
    protected $guarded = ['id'];

    public function getUmkm()
    {
        return $this->belongsTo('App\Model\Umkm','umkm_id');
    }
    
    protected $casts = [
        'bukti' => 'array',
    ];
}
