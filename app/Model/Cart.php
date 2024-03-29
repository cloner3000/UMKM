<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
   protected $table= 'carts';
   protected $guarded = ['id'];

    public function getProduct()
    {
        return $this->belongsTo('App\Model\Produk','produk_id');
    }

    public function getPembeli()
    {
        return $this->belongsTo('App\Produk','user_id');
    }

    public function getReview()
    {
        return $this->hasOne('App\Model\Review','carts_id');
    }

}
