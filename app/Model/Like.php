<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $table = 'likes';
    protected $fillable = [
        'user_id', 'produk_id',
    ];

    public function getProduct()
    {
        return $this->belongsTo('App\Model\Produk','produk_id');
    }
}
