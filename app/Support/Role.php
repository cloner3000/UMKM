<?php
/**
 * Created by PhpStorm.
 * User: ilham
 * Date: 29/03/2019
 * Time: 14:08
 */

namespace App\Support;


class Role
{
    //init role
    const ROOT = 'root';
    const DISKOP = 'diskop';
    const UMKM = 'umkm';
    const PEMBELI = 'pembeli';

    const ALL = [
        Role::ROOT,
        Role::DISKOP,
        Role::UMKM,
        Role::PEMBELI
    ];
}
