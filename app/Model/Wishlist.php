<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $table = 'wishlists';
    protected $guarded = ['id'];

    public function getProduct()
    {
        return $this->belongsTo('App\Model\Produk','produk_id');
    }
}
