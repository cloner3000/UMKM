<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Umkm extends Model
{
    protected $table = 'umkm';
    protected $guarded = ['id'];

    public  function getUmkm($user)
    {
        return ($this->where('user_id',$user)->first());
    }
}
