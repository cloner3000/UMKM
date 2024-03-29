<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'reviews';
    protected $guarded = ['id'];

    public function getCart()
    {
        return $this->belongsTo('App\Model\Cart','carts_id');
    }
}
