<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = [
        'user_id', 'status', 'order_item_ids'
    ];

    protected $casts = [
        'order_item_ids' => 'array',
    ];
}
