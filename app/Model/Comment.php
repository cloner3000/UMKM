<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    protected $fillable = [
        'user_id', 'produk_id', 'title', 'message','isAnswer','comment_id'
    ];

    public function getProduct()
    {
        return $this->belongsTo('App\Model\Produk','produk_id');
    }

}
