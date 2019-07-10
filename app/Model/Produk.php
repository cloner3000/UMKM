<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produk extends Model
{
    use SoftDeletes;
    protected $table = 'produks';

    protected $guarded = ['id'];
//    protected $fillable = ['umkm_id','nama','short_desc','long_desc','keyword','kategori_ids','harga','stock','purchase_order'
//        ,'pic1','pic2','status','ratting','isHide','isDiscount','discount'];

    protected $casts = [
        'kategori_ids' => 'array',
        'pic1' => 'array'
    ];
    protected $dates = ['deleted_at'];

    public function getUmkm()
    {
        return $this->belongsTo('App\Model\Umkm','umkm_id');
    }

    public function getLike()
    {
        return $this->hasMany('App\Model\Like','produk_id');
    }

    public function getComment()
    {
        return $this->hasMany('App\Model\Comment','produk_id');
    }

    public function getWishlist()
    {
        return $this->hasMany('App\Model\Wishlist','produk_id');
    }

    public function getCart()
    {
        return $this->hasMany('App\Model\Cart','produk_id');
    }

}
