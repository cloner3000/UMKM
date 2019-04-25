<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produk extends Model
{
    use SoftDeletes;
    protected $table = 'produks';
    protected $casts = [
        'kategori_ids' => 'array',
        'pic1' => 'array'
    ];
    protected $guarded = ['id'];
    protected $dates = ['deleted_at'];


}
