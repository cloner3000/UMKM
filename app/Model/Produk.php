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

    public function getUmkm()
    {
        return $this->belongsTo('App\Model\Umkm','umkm_id');
    }

    public function getReview()
    {
        return $this->hasMany('App\Model\Review','produk_id');
    }

    public function getLike()
    {
        return $this->hasMany('App\Model\Like','produk_id');
    }

    public function getComment()
    {
        return $this->hasMany('App\Model\Comment','produk_id');
    }

}
