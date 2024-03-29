<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menu';
    protected $fillable = [
        'manu_name', 'desc', 'isChild', 'menu_parent', 'type', 'status',
    ];
}
