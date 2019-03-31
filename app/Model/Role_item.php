<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Role_item extends Model
{
    protected $table = 'role_item';
    protected $fillable = [
        'menu_id', 'role_id', 'akses', 'insert', 'update', 'delete',
    ];
}
